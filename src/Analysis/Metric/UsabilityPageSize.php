<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityPageSize extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Page Size';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('13.5 Kb (World Wide Web average is 600 Kb)');
    }
}
