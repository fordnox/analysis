<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsLocalization extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Visitors Localization';
    protected $impact_level     = 'low';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $output = null;
        $this->setOutput($output);
    }
}
