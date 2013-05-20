<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityWhois extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Whois Privacy';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('Show whois details');
    }
}
