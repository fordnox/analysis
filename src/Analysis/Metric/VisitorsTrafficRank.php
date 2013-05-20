<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsTrafficRank extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Traffic Rank';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $rank = $this->getAnalyzer()->getRankAlexa();

        $output = $rank.'th most visited website in the World';
//        $output .= '<br/>';
//        $output .= '367th most visited website in United States';
        $this->setOutput($output);
    }
}
