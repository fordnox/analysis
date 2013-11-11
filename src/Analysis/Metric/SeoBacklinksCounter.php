<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBacklinksCounter extends Metric
{
    protected $category         = 'SEO Backlinks';
    protected $title            = 'Counter';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'pass';

    public function process()
    {
        $backlinks = $this->getAnalyzer()->getBacklinksGoogle();
        $this->setPassLevel('pass');
        $this->setOutput($backlinks.' backlinks on google');
    }
}
