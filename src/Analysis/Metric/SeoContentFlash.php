<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoContentFlash extends Metric
{
    protected $category         = 'SEO Content';
    protected $title            = 'Flash';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        if($this->getAnalyzer()->hasFlash()) {
            $this->setPassLevel('pass');
            $this->setOutput('No');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('Yes');
        }
    }
}
