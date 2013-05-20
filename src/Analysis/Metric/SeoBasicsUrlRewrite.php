<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsUrlRewrite extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'URL Rewrite';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('Perfect, your URLs look clean.');
    }
}
