<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityLoadTime extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Load Time';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('0.01 second(s) (1465.37 Kb/s)');
    }
}
