<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;

class SeoBasicsWwwResolve extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'WWW Resolve';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    private function checkWww()
    {
        $page = $this->getPage();
        $url = $page->getUrl();
        if (preg_match('|://www\.|i', $url)) {
            $www = $url;
            $url = preg_replace('|://www\.|', '://', $url);
        } else {
            $www = preg_replace('|://|', '://www.', $url);
        }
        $new_page = new Page();
        $www_page = new Page();
        $new_page->setUrl($url);
        $www_page->setUrl($www);

        return $new_page->getLastEffectiveUrl() == $www_page->getLastEffectiveUrl();
    }

    public function process()
    {
        if ($this->checkWww()){
            $this->setPassLevel('pass');
            $this->setOutput('Perfect! Your website with and without www redirects to the same page.');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('Too bad, it seems your website display different sites with and wihout www.');
        }
    }
}
