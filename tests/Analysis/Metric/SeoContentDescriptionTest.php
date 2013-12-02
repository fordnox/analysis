<?php
class Analysis_Metric_SeoContentDescriptionTest extends PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
        $page = new Analysis\Page();
        $page->setUrl($GLOBALS['TEST_URL']);

        $analyzer = new Analysis\Analyzer();
        $analyzer->setPage($page);

        $metric = new Analysis\Metric\SeoContentDescription();
        $metric->setAnalyzer($analyzer);
        $metric->setPage($page);
        $metric->process();

        $this->assertEquals($metric->getPassLevel(), 'fail');
    }
}