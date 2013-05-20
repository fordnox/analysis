<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoBasicsRobotsTxt extends Metric
{
    protected $category         = 'SEO Basics';
    protected $title            = 'robots.txt';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fail';

    private function getRobotsTxtLink()
    {
        return $this->getPage()->getDomainLink().'/robots.txt';
    }

    public function process()
    {
        $link = $this->getRobotsTxtLink();
        if($this->getAnalyzer()->urlExists($link)) {
            $this->setPassLevel('pass');
            $this->setOutput('Perfect! Your website has defined rules for search engines.');
        } else {
            $this->setPassLevel('fail');
            $this->setOutput('Your website does not have rules for search engines.');
        }
    }
}
