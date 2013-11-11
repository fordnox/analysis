<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentTitle extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Title';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    public function getTitle()
    {
        $dom = $this->getAnalyzer()->getPage()->getSimpleHtmlDomObject();
        $title = $dom->find('title', 0);
        return $title->text;
    }

    public function process()
    {
        $length = strlen($this->getTitle());
        $this->setPassLevel('pass');
        $this->setOutput(sprintf('Length: %s character(s)', $length));
    }
}
