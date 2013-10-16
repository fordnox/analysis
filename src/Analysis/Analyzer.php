<?php
namespace Analysis;
use Analysis\Page;
use Novutec\TypoSquatting\Typo;
use Novutec\DomainParser\Parser;
use Novutec\WhoisParser\Parser as WhoisParser;

class Analyzer
{
    private $fb_stats = null;
    /**
     * @var Page $page
     */
    private $page;

    public function setPage(Page $page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    /**
     * @see http://www.seositecheckup.com/directory_browsing.php
     * @return bool
     */
    public function getServerAllowsDirectoryBrowsing()
    {
        return false;
    }

    public function getIframeRenderingProtectionHeaderValue()
    {
        $rh = $this->getPage()->getResponseHeaders();
        return isset($rh['x-frame-options']) ? $rh['x-frame-options'] : null;
    }

    public function getSimilarTyposDomainsWithAvailability(){
        $res = array();
        foreach($this->getSimilarTyposDomains() as $domain) {
            $res[$domain] = $this->isDomainAvailableForRegistration($domain);
        }
        return $res;
    }

    public function getSimilarTldsDomainsWithAvailability(){
        $res = array();
        foreach($this->getSimilarTldsDomains() as $domain) {
            $res[$domain] = $this->isDomainAvailableForRegistration($domain);
        }
        return $res;
    }

    private function isDomainAvailableForRegistration($domain){
        return false;
    }

    private function getPopularDomainTlds(){
        return array(
            '.com',
            '.net',
            '.org',
            '.us',
            '.biz',
            '.info',
        );
    }

    private function getSimilarTyposDomains(){
        $domain = $this->getPage()->getSldTld();
        $tld = $this->getPage()->getDomainTld(false);
        $Typo = new Typo();
        $Typo->setFormat('array');
        $result = $Typo->lookup($domain, $tld);
        return $result['typosByMissedLetters'];
    }

    private function getSimilarTldsDomains(){

        $sld = $this->getPage()->getDomainSld();
        $ctld = $this->getPage()->getDomainTld();
        $popular = $this->getPopularDomainTlds();
        $res = array();
        foreach($popular as $tld) {
            if($tld == $ctld) continue;
            $res[] = $sld.$tld;
        }
        return $res;
    }

    public function getMobileLoadTime(){
        return 5;
    }

    public function getMobileHasCss(){
        return false;
    }

    public function getMobileHasAppleIcon(){

        $simple_dom = $this->getPage()->getSimpleHtmlDomObject();
        $node = $simple_dom->find('link[rel=apple-touch-icon]', 0);

        if ($node && $node->href) return true;
        return false;
    }

    public function getMobileHasMetaViewportTag(){
        $simple_dom = $this->getPage()->getSimpleHtmlDomObject();
        $node = $simple_dom->find('meta[name=viewport]', 0);

        if ($node && $node->content) return true;
        return false;
    }

    public function getMobileHasRedirection(){
        return false;
    }

    public function getRankAlexa()
    {
        $SEOstats = new \SEOstats\SEOstats($this->getPage()->getUrl());
        return $SEOstats->Alexa()->getGlobalRank();
    }

    public function getSocialFacebookStats()
    {
        if ($this->fb_stats) return $this->fb_stats;
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $query = "select total_count,like_count,comment_count,share_count,click_count from link_stat where url='{$url}'";
        $call = "https://api.facebook.com/method/fql.query?query=" . rawurlencode($query) . "&format=json";
        $p->setUrl($call);
        $data = json_decode($p->getContent());
        return $this->fb_stats = $data[0];
    }

    public function getSocialFacebookLikes(){
        $stats = $this->getSocialFacebookStats();
        return $stats->like_count?:0;
    }

    public function getSocialFacebookComments(){
        $stats = $this->getSocialFacebookStats();
        return $stats->comment_count?:0;
    }

    public function getSocialFacebookShares(){
        $stats = $this->getSocialFacebookStats();
        return $stats->share_count?:0;
    }

    public function getSocialDelicious(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'http://feeds.delicious.com/v2/json/urlinfo/data?url='.rawurlencode($url);
        $p->setUrl($call);
        $data = json_decode($p->getContent());
        return $data[0]->total_posts?:0;
    }

    public function getSocialGplus(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'https://plusone.google.com/_/+1/fastbutton?url='.rawurlencode($url);
        $p->setUrl($call);
        //@hack, as google+ does not support showing count without api key
        preg_match( '/window\.__SSR = {c: ([\d]+)/', $p->getContent(), $matches );

        if( isset( $matches[0] ) )
            return (int) str_replace( 'window.__SSR = {c: ', '', $matches[0] );
        return 0;
    }

    public function getSocialLinkedin(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'http://www.linkedin.com/countserv/count/share?format=json&url='.rawurlencode($url);
        $p->setUrl($call);
        $data = json_decode($p->getContent());
        return $data->count?:0;
    }

    public function getSocialTweets(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'http://urls.api.twitter.com/1/urls/count.json?url='.rawurlencode($url);
        $p->setUrl($call);
        $data = json_decode($p->getContent());
        return $data->count?:0;
    }

    public function getSocialStumbleupon(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url='.rawurlencode($url);
        $p->setUrl($call);
        $data = json_decode($p->getContent());
        return $data->result->views?$data->result->views:0;
    }

    public function getSocialPinterest(){
        $url = $this->getPage()->getUrl();
        $p = new Page();
        $call = 'http://api.pinterest.com/v1/urls/count.json?callback=receiveCount&url='.rawurlencode($url);
        $p->setUrl($call);
        $data = json_decode(substr($p->getContent(), 13, -1));
        return $data->count?:0;
    }

    public function pageContainsEmails()
    {
        return true;
    }

    public function getBacklinksGoogle()
    {
        return 1000;
    }

    public function getIndexedPagesGoogle()
    {
        return 1000;
    }

    public function getRankPagerank()
    {
        return 5;
    }

    public function getDomainExpirationDate()
    {
        return date('c');
    }

    public function getDomainRegistrationDate()
    {
        return date('c');
    }

    public function isPageUrlUserFriendly()
    {
        return true;
    }

    public function hasFlash()
    {
        $page = $this->getPage();
        $simple_dom = $page->getSimpleHtmlDomObject();
        $node = $simple_dom->find('object');
        return !empty($node);
    }

    public function getPageSize()
    {
        $content = $this->getPage()->getContent();
        return round((strlen($content) * 8) / 1024, 2);
    }

    public function getFaviconUrl()
    {
        $domain = $this->getPage()->getDomainLink();
        $favicon = $domain.'/favicon.ico';

        $simple_dom = $this->getPage()->getSimpleHtmlDomObject();
        $node = $simple_dom->find('link[rel=icon], link[rel=shortcut], link[rel="shortcut icon"]', 0);
        if ($node && $node->href) $favicon = strpos($node->href, '//')!==false?$node->href:$domain.($node->href[0] != '/'?'/':'').$node->href;
        if ($favicon[0] == '/') $favicon = 'http:'.$favicon;
        if($this->urlExists($favicon)) {
            return $favicon;
        }

        return false;
    }

    public function urlExists($url)
    {
        try {
            $browser = new \Buzz\Browser();
            $response = $browser->get($url);
            $bool = $response->isOk();
        } catch (\Exception $e) {
            error_log($e);
            $bool = false;
        }

        return $bool;
    }

    public function getWhois()
    {
        $domain = $this->getPage()->getSldTld();

        $Parser = new WhoisParser();
        $Parser->setFormat('array');
        $result = $Parser->lookup($domain);

//        $result = $Parser->lookup($ipv4);
//        $result = $Parser->lookup($ipv6);
//        $result = $Parser->lookup($asn);

        return $result;
    }

    public function getServerIpLocation()
    {
        $ip = gethostbyname($this->getPage()->getDomainName());
        return array('ip'=>$ip, 'location'=>'Dallas');
    }

    public function isIpSpammer()
    {
        return true;
    }

    public function getMetaKeywords()
    {
        $keywords = "email, marketing, HTML newsletters, stats, resources, postcards, campaigns, list, listserv, distribution, subscription, tool, opt-in, unsubscribe, signup, forms, hosted, database, free, account";
        return $keywords;
    }

    public function getTextHtmlRatio()
    {
        return 6.2;
    }
}