<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsIpCanonicalization extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'IP Canonicalization';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('Yes');
    }
}
