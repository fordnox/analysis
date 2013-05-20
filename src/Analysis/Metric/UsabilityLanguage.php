<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityLanguage extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Language';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('Declared: en </br>Detected: en');
    }
}
