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

    /**
     * @todo finish
     */
    public function process()
    {
        if ($this->getAnalyzer()->getServer()) {
            $output = 'Yes';
        } else {
            $output = 'No';
        }
        $this->setOutput($output);
    }
}
