<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsTrafficRank extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Global Traffic Rank';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';
    protected $pass_level       = 'fyi';

    public function process()
    {
        $rank = $this->getAnalyzer()->getRankAlexa();
        $output = $rank.'th most visited website in the World';
        $this->setOutput($output);
    }
}
