<?php
namespace Analysis\Report;
use Analysis\Report;

class Text implements ReportRenderer
{
    public function setReport(Report $report)
    {
        $this->report = $report;
    }

    public function getOutput()
    {
        $page = $this->report->getPage();
        $out = '';
        $out .= $page->getSldTld();
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