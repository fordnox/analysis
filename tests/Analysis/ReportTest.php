<?php

class Analysis_ReportTest extends PHPUnit_Framework_TestCase
{
    public function testReport()
    {
        $url = 'http://www.google.com/doodles/about';

        $page = new Analysis\Page();
        $page->setUrl($url);

        $analyzer = new Analysis\Analyzer();
        $analyzer->setPage($page);

        $report = new Analysis\Report();
        $report->setPage($page);
        $report->setAnalyzer($analyzer);
        $report->setTranslation(new Analysis\Translation\En());
//        $report->generate();

//        $reportHtml = new Analysis\Report\Text();
//        $reportHtml->setReport($report);
//        $out = $reportHtml->getOutput();
//        $this->assertTrue(strlen($out) > 10);
    }
}