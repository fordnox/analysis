<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityDirectoryBrowsing extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Directory Browsing';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $yes = $this->getAnalyzer()->getServerAllowsDirectoryBrowsing();

        if($yes) {
            $this->setPassLevel('fail');
            $this->setOutput('Yes');
        } else {
            $this->setPassLevel('pass');
            $this->setOutput('No');
        }
    }
}
