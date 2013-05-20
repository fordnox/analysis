<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class MobileLoadTime extends Metric
{
    protected $category         = 'Mobile';
    protected $title            = 'Mobile Load Time';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $time = $this->getAnalyzer()->getMobileLoadTime();
        $output = $time.'ms';
        $this->setOutput($output);
    }
}
