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

        if (checkdnsrr($domain, 'ANY')) return false;
        $whois = $this->getWhois($domain);
        if ($whois['nameserver'] || $whois['expires'] || $whois['contacts']) return false;
        return true;
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
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $screens = $dom->find('meta[content*=max-width], meta[content*=max-device-width]');
        foreach ($screens as $screen) {
            if(preg_match_all('|max-(device-)?width:\s*(\d+)px|', $screen->content, $matches)) {
                foreach ($matches[2] as $match) {
                    if ($match < 501) return true;
                }
            }

        }
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
        $content = $this->getPage()->getContent();
        return preg_match('/((([a-z]|\d|[!#\$%&\'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&\'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?/i', $content);
    }

    public function getBacklinksGoogle()
    {
        $url = $this->getPage()->getUrl();
        $backlinks = \SEOstats\Services\Google::getBacklinksTotal($url);
        return $backlinks;
    }

    public function getIndexedPagesGoogle()
    {
        $url = $this->getPage()->getUrl();
        $index = \SEOstats\Services\Google::getSearchResultsTotal($url);
        return $index;
    }

    public function getRankPagerank()
    {
        $url = $this->getPage()->getUrl();
        $rank = \SEOstats\Services\Google::getPageRank($url);
        return $rank;
    }

    public function getDomainExpirationDate()
    {
        $domain = $this->getPage()->getSldTld();

        $Parser = new WhoisParser();
        $Parser->setFormat('array');
        $result = $Parser->lookup($domain);
        return $result['expires'];
    }

    public function getDomainRegistrationDate()
    {
        $domain = $this->getPage()->getSldTld();

        $Parser = new WhoisParser();
        $Parser->setFormat('array');
        $result = $Parser->lookup($domain);
        return $result['created'];
    }

    public function isPageUrlUserFriendly()
    {
        $url = $this->getPage()->getUrl();
        if (strpos($url, '?') !== false || strpos($url, '&') !== false || strpos($url, '=') !== false || strpos($url, '.php') !== false) return false;
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
        $p = new Page();
        $p->setUrl('http://freegeoip.net/json/'.$ip);
        $data = json_decode($p->getContent(), true);
        return $data;
    }

    public function isIpSpammer()
    {
        $page = $this->getPage();
        $ip = gethostbyname($page->getDomainName());
        $p = new Page();
        $p->setUrl('http://www.stopforumspam.com/api?ip='.$ip);
        $xml = simplexml_load_string($p->getContent());
        return $xml->appears == 'yes';
    }

    public function getMetaKeywords()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $keywords = $dom->find('meta[name=keywords]');
        if ($keywords) $keywords = $keywords->content;
        return $keywords;
    }

    public function getTextHtmlRatio()
    {
        $page = $this->getPage();
        $content = $page->getContent();
        $text = $page->getTextContent();
        $ratio = strlen($content)/strlen($text)?:1;
        $ratio = round($ratio, 2);
        return $ratio;
    }

    public function getW3CValidator()
    {
        $p = new Page();
        // @hack to access w3c
        ini_set('user_agent', 'Mozilla/5.0 (PHP Analyzer) Version 1.0');
        $p->setUrl('http://validator.w3.org/check?uri='.$this->getPage()->getUrl());

        return $p;
    }

    public function getTagCloud($limit = 10)
    {
        $text = $this->getPage()->getTextContent();
        $text = mb_strtolower($text);
        preg_match_all("/[^\s^0-9.;:\/()!?$#@%*_`~|\-,]{4,}/", $text, $matches);
        $values = array_count_values($matches[0]);
        arsort($values);
        $result = array_slice($values, 0, $limit);
        return $result;
    }

    public function getHeaders()
    {
        $full_headers = array();
        $headers = $this->getPage()->getResponseHeaders();
        foreach ($headers as $header) {
            list($key, $val) = explode(': ', $header, 2);
            $full_headers[$key] = $val;
        }
        return $full_headers;
    }

    public function getServer()
    {
        $headers = $this->getHeaders();
        return $headers['Server'];
    }

    public function containsAnalytics()
    {
        $content = $this->getPage()->getContent();
        return strpos($content,'pageTracker._trackPageview();') !== false || strpos($content, "'.google-analytics.com/ga.js';") !== false;
    }
}