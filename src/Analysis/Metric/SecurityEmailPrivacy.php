<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SecurityEmailPrivacy extends Metric
{
    protected $category         = 'Security';
    protected $title            = 'Email Privacy';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'pass';

    public function process()
    {
        $contains =$this->getAnalyzer()->pageContainsEmails();
        if($contains) {
            $this->setOutput('Not Good, email address has been found in plain text. You can expect spam in this email address.');
            $this->setPassLevel('fail');
        } else {
            $this->setOutput('Good, no email address has been found in plain text.');
            $this->setPassLevel('pass');
        }
    }
}
