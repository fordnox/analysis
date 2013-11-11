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

    public function process()
    {
        $analytics = $this->getAnalyzer()->containsAnalytics();
        if (!$analytics) {
            $this->setPassLevel('fail');
            $output = 'No';
        } else {
            $this->setPassLevel('pass');
            $output = 'Yes';
        }
        $this->setOutput($output);
    }
}
