<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentFrames extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Frames';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    private function hasFrames()
    {
        $dom = $this->getAnalyzer()->getPage()->getSimpleHtmlDomObject();
        $frame = $dom->find('frame', 0);
        if ($frame) return true;
        return false;
    }

    public function process()
    {
        $frames = $this->hasFrames();
        if ($frames) {
            $this->setPassLevel('fail');
            $this->setOutput('Yes');
        } else {
            $this->setPassLevel('pass');
            $this->setOutput('No');
        }
    }
}
