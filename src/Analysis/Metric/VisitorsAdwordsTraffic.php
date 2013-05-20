<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;

class VisitorsAdwordsTraffic extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Adwords Traffic';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    /**
     * @todo finish
     */
    public function process()
    {
        $adwords = 10;
        $organic = 90;

        $output = '<img src="https://chart.googleapis.com/chart?cht=p&chd=s:10,90&chs=200x100&chdl=AdWords|Organic" alt="Pie">';
        $this->setOutput($output);
    }
}
