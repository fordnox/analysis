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
        $info = $this->getAnalyzer()->getServerIpLocation();
        $this->setOutput(sprintf('%s Server location: %s', $info['ip'], $info['location']));
        return true;
    }
}
