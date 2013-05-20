<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class MobileRendering extends Metric
{
    protected $category         = 'Mobile';
    protected $title            = 'Mobile Rendering';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $output='<div class="progress"><div class="bar" style="width: 76%;"></div></div>';
        $this->setOutput($output);

        //skip this metric
        $this->setOutput(false);
    }
}
