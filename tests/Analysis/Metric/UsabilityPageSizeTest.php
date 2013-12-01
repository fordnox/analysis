<?php
class Analysis_Metric_UsabilityPageSizeTest extends PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $page = new Analysis\Page();
        $page->setUrl($GLOBALS['TEST_URL']);

        $analyzer = new Analysis\Analyzer();
        $analyzer->setPage($page);

        $metric = new Analysis\Metric\UsabilityPageSize();
        $metric->setAnalyzer($analyzer);
        $metric->setPage($page);

        $this->assertTrue($metric->process());
    }
}