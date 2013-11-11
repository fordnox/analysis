<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsIpCanonicalization extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'IP Canonicalization';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    private function isCanonicalized()
    {
        $page = $this->getAnalyzer()->getPage();
        $domain = $page->getDomainName();
        $ip = gethostbyname($domain);
        $page_ip = new \Analysis\Page();
        $page_ip->setUrl('http://'.$ip);

        return $page->getLastEffectiveUrl() == $page_ip->getLastEffectiveUrl();
    }

    public function process()
    {
        if ($this->isCanonicalized()) {
            $this->setPassLevel('pass');
            $this->setOutput('Yes');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('No');
        }
    }
}
