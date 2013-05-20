<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesW3CValidity extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'W3C Validity';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('Invalid: 10 Errors, 2 Warning(s)');
    }
}
