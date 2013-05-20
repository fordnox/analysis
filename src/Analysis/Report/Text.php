<?php
namespace Analysis\Report;
use Analysis\Report;

class Text
{
    public function setReport(Report $report)
    {
        $this->report = $report;
    }

    public function getOutput()
    {
        $domain = $this->report->getDomain();
        $out = '';
        $out .= $domain->getDomain();
        $out .= PHP_EOL;

        foreach($this->report->getMetrics() as $category=>$metrics) {
            $out .= $category . PHP_EOL;
            foreach($metrics as $metric) {
                $out .= $metric->getTitle() . PHP_EOL;
                $out .= $metric->getOutput() . PHP_EOL;
                $out .= $metric->getPassLevelText() . PHP_EOL;
                $out .= PHP_EOL;
                $out .= PHP_EOL;
            }
            $out .= PHP_EOL;
        }

        return $out;
    }
}