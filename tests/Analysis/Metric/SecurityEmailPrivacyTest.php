<?php
class Analysis_Metric_SecurityEmailPrivacyTest extends PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $analyzer = new Analysis\Analyzer();
        $page = new Analysis\Page();

        $metric = new Analysis\Metric\SecurityEmailPrivacy();
        $metric->setAnalyzer($analyzer);
        $metric->setPage($page);

        $this->assertEquals($metric->getPassLevel(), 'pass');
    }
}