<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsUrlRewrite extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'URL Rewrite';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    private function isUrlClean()
    {
        $url = $this->getPage()->getUrl();
        if (strpos('.php', $url) !== false || strpos('&', $url) !== false || strpos('=', $url)!==false ) return false;
        return true;
    }

    /**
     * @todo implement inner-pages urls check
     */
    public function process()
    {
        $clean = $this->isUrlClean();
        if ($clean) {
            $this->setPassLevel('pass');
            $output = 'Perfect, your URLs look clean.';
        } else {
            $this->setPassLevel('fail');
            $output = 'Your url is not clean, it does not have url-rewrite.';
        }
        $this->setPassLevel('pass');
        $this->setOutput($output);
    }
}
