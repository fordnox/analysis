<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentTextHtmlRatio extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Text/HTML Ratio';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    public function process()
    {
        $ratio = $this->getAnalyzer()->getTextHtmlRatio();
        if ($ratio < 20){
            $this->setPassLevel('fail');
        } else {
            $this->setPassLevel('pass');
        }
        $this->setOutput($ratio.'%');
    }
}
