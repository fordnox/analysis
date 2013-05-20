<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityServerIp extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Server IP';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('50.22.201.236 Server location: ￼ DALLAS');
    }
}
