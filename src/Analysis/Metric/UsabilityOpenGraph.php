<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityOpenGraph extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Open Graph';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('Missing');
    }
}
