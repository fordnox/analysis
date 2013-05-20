<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesGoogleAnalytics extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Google Analytics';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('No');
    }
}
