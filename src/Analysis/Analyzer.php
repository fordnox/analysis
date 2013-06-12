<?php
namespace Analysis;
use Analysis\Page;
use Novutec\TypoSquatting\Typo;
use Novutec\DomainParser\Parser;
use Novutec\WhoisParser\Parser as WhoisParser;

class Analyzer
{
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
        return false;
    }

    public function getMobileHasMetaViewportTag(){
        return false;
    }

    public function getMobileHasRedirection(){
        return false;
    }

    public function getRankAlexa()
    {
        $SEOstats = new \SEOstats($this->getPage()->getUrl());
        return $SEOstats->Alexa()->getGlobalRank();
    }

    public function getSocialFacebookLikes(){}

    public function getSocialFacebookComments(){}

    public function getSocialFacebookShares(){}

    public function getSocialDelicious(){}

    public function getSocialGplus(){}

    public function getSocialLinkedin(){}

    public function getSocialTweets(){}

    public function getSocialStumbleupon(){}

    public function getSocialPinterest(){}

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
        if($this->urlExists($favicon)) {
            return $favicon;
        }

        //@todo other ways to determine favicon
//        $simple_dom = $this->getPage()->getSimpleHtmlDomObject();
//        $node = $simple_dom->getElementByTagName('link');
//        $node->dump_node();

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
}