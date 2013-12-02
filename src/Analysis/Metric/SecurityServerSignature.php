<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityServerSignature extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Server Signature';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $server = $this->getAnalyzer()->getServer();
        if ($server) {
            $this->setPassLevel('pass');
            $output = $server;
        } else {
            $output = 'unknown';
        }
        $this->setOutput($output);
    }
}
