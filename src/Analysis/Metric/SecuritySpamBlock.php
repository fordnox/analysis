<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecuritySpamBlock extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Spam Block';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    /**
     * @todo finish
     */
    public function process()
    {
        $this->setOutput('Your Server IP is not Blacklisted in the <a href="http://www.stopforumspam.com/" target="_blank">Spammer Directory</a>.');
    }
}
