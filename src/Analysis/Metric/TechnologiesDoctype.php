<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class TechnologiesDoctype extends Metric
{
    protected $category         = 'Technologies';
    protected $title            = 'Doctype';
    protected $impact_level     = 'low';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('HTML5');
    }
}
