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
        $spammer = $this->getAnalyzer()->isIpSpammer();
        if ($spammer) {
            $output = 'Your Server IP is Blacklisted in the <a href="http://www.stopforumspam.com/" target="_blank">Spammer Directory</a>.';
            $this->setPassLevel('fail');
            $response = false;
        } else {
            $output = 'Your Server IP is not Blacklisted in the <a href="http://www.stopforumspam.com/" target="_blank">Spammer Directory</a>.';
            $this->setPassLevel('pass');
            $response = true;
        }
        $this->setOutput($output);
        return $response;
    }
}
