<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentBlog extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Blog';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $blog = $this->isBlog();
        if ($blog){
            $this->setPassLevel('pass');
            $output = 'We found a Blog on this website.';
        } else {
            $this->setPassLevel('fail');
            $output = 'We found no Blog on this website.';
        }
        $this->setOutput($output);
    }

    private function isBlog()
    {
        $wp = $this->isWordPress();
        $blogger = $this->isBlogger();
        $pivotx = $this->isPivotX();
        $atom = $this->hasAtom();
        $rss = $this->hasRSS();
        return $wp || $blogger || $pivotx || $atom || $rss;

        }

    private function isWordPress()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $wp = $dom->find('link[href*=wp-includes]', 0);
        if ($wp) return true;
        return false;
    }

    private function isBlogger()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $blogger = $dom->find('link[href*=blogger]', 0);
        if ($blogger) return true;
        return false;
    }

    private function isPivotX()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $pivot = $dom->find('div#pivotx-nav', 0);
        if ($pivot) return true;
        return false;
    }

    private function hasAtom()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $atom = $dom->find('link[href*=atom]', 0);
        if ($atom) return true;
        return false;
    }

    private function hasRSS()
    {
        $dom = $this->getPage()->getSimpleHtmlDomObject();
        $rss = $dom->find('link[href*=rss]', 0);
        if ($rss) return true;
        return false;
    }

}
