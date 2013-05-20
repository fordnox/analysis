<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsWwwResolve extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'WWW Resolve';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setPassLevel('pass');
        $this->setOutput('Perfect! Your website with and without www redirects to the same page.');
    }
}
