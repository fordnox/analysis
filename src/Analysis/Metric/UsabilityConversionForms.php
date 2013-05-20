<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityConversionForms extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Conversion Forms';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('fail');
        $this->setOutput('We could not find a Conversion Form on this page.');
    }
}
