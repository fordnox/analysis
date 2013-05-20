<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class SeoAuthorityPagerank extends Metric
{
    protected $category         = 'SEO Authority';
    protected $title            = 'Pagerank';
    protected $impact_level     = 'high';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'moderate';

    /**
     * @todo finish
     */
    public function process()
    {
        $rank = $this->getAnalyzer()->getRankPagerank();

        switch($rank) {
            case 0:
                $this->setPassLevel('fail');
                break;

            case 1:
            case 2:
            case 3:
            $this->setPassLevel('moderate');
                break;

            default:
            $this->setPassLevel('pass');
                break;
        }

        $this->setOutput('Pagerank '.$rank);
    }
}
