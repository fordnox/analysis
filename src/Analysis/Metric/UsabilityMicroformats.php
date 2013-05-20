<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityMicroformats extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Microformats';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('We found 0 type(s) of Microformat');
    }
}
