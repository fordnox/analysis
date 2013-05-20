<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class UsabilityUrl extends Metric
{
    protected $category         = 'Usability';
    protected $title            = 'URL';
    protected $impact_level     = 'high';
    protected $solve_level      = 'easy';

    /**
     * @todo finish
     */
    public function process()
    {
        if($this->getAnalyzer()->isPageUrlUserFriendly()) {
            $this->setPassLevel('pass');
        } else {
            $this->setPassLevel('fail');
        }
        $this->setOutput(sprintf('URL: %s', $this->getPage()->getUrl()));
        return true;
    }
}
