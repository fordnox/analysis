<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityEmailPrivacy extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Email Privacy';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('Good, no email address has been found in plain text.');
    }
}
