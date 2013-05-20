<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsTrafficEstimations extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Traffic Estimations';
    protected $impact_level     = 'high';
    protected $solve_level      = 'very-hard';

    /**
     * @todo finish
     */
    public function process()
    {
        $rank = $this->getAnalyzer()->getRankAlexa();

        if(!$rank) {
            $points = 0;
        } elseif($rank > 0 && $rank < 10) {
            $points = 99;
        } elseif($rank >= 10 && $rank < 100) {
            $points = 90;
        } elseif($rank >= 100 && $rank < 1000) {
            $points = 85;
        } elseif($rank >= 1000 && $rank < 5000) {
            $points = 80;
        } elseif($rank >= 5000 && $rank < 10000) {
            $points = 70;
        } elseif($rank >= 10000 && $rank < 50000) {
            $points = 60;
        } elseif($rank >= 50000 && $rank < 100000) {
            $points = 50;
        } elseif($rank >= 100000 && $rank < 300000) {
            $points = 40;
        } elseif($rank >= 300000 && $rank < 500000) {
            $points = 30;
        } elseif($rank >= 500000 && $rank < 1000000) {
            $points = 25;
        } elseif($rank >= 1000000) {
            $points = 10;
        }

        $output='<div class="progress"><div class="bar" style="width: '.$points.'%;"></div></div>';
        $this->setOutput($output);
    }
}
