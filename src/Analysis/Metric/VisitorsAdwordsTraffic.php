<?php
namespace Analysis\Metric;
use Analysis\Metric;
use Analysis\Exception;
use Analysis\Page;
use Analysis\SEMRushApi;

class VisitorsAdwordsTraffic extends Metric
{
    protected $category         = 'Visitors';
    protected $title            = 'Adwords Traffic';
    protected $impact_level     = 'medium';
    protected $solve_level      = 'easy';
    protected $pass_level       = 'fyi';

    private function getTraffic()
    {
        $domain = $this->getPage()->getDomainName();
        $sm = new SEMRushApi();
        $sm->setDomain($domain);
        return $sm->AdwordsTraffic();
    }

    private function toPercent($data)
    {
        $sum = array_sum($data);
        $result = array();
        foreach ($data as $k=>$v) {
            if ($sum == 0) {
                $result[$k] = 0;
            } else {
                $result[$k] = round($v/$sum*100);
            }
        }
        return $result;
    }

    public function process()
    {
        try {
            $traffic = $this->getTraffic();
            $traffic = $this->toPercent($traffic[0]);
        } catch(\Exception $e) {
            error_log($e);
            return 'Traffic information can not be retrieved';
        }

        $output = sprintf('<img src="https://chart.googleapis.com/chart?cht=p&chd=t:%d,%d&chs=200x100&chdl=AdWords|Organic" alt="Traffic">', $traffic['At'], $traffic['Ot']);
        $this->setOutput($output);
    }
}
