<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityFavicon extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'Favicon';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $fvicon = $this->getAnalyzer()->getFaviconUrl();

        if($fvicon) {
            $this->setPassLevel('pass');
            $this->setOutput('Yes '. $fvicon);
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('No');
        }
    }
}
