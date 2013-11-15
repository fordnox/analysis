<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class SecuritySafeBrowsing extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Trust indicators';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        if ($this->isSafe()) {
            $this->setOutput('Yes');
            $this->setPassLevel('pass');
        } else {
            $this->setOutput('No');
            $this->setPassLevel('fail');
        }
    }

    private function isSafe()
    {
        $url = $this->getAnalyzer()->getPage()->getDomainName();
        $service_url = 'http://google.com/safebrowsing/diagnostic?site='.$url.'/&hl=en';
        $p = new Page();
        $p->setUrl($service_url);
        $content = $p->getContent();
        return strpos($content, 'Site is listed as suspicious') === false;
    }
}
