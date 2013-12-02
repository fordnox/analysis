<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityLoadTime extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Load Time';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'pass';

    public function process()
    {
        $start = microtime(TRUE);
        $content = $this->getPage()->getContent();
        $end = microtime(TRUE);
        $diff = $end-$start;
        $speed = strlen($content)/1024/($diff?$diff:1);
        $this->setOutput(sprintf('%.2f second(s) (%.2f Kb/s)', $diff, $speed));
    }
}
