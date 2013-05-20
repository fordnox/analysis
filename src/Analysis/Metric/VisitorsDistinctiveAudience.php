<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsDistinctiveAudience extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Distinctive Audience';
    protected $impact_level     = 'low';
    protected $solve_level      = 'hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $rank = $this->getAnalyzer()->getRankAlexa();

        $output = 'This website tends to be popular amongst:';
        $output .= '<br/>';
        $output .= 'Females aged between 25 and 34 connecting from work';
        $this->setOutput($output);
    }
}
