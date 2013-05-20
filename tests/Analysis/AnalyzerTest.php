<?php

class Analysis_AnalyzerTest extends PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $page = new Analysis\Page();
        $page->setUrl('http://www.1pagerank.com/page/what-is-page-rank');

        $analyzer = new Analysis\Analyzer();
        $analyzer->setPage($page);

        $this->page = $page;
        $this->analyzer = $analyzer;
    }

    public function testFavicon()
    {
        $ico = $this->analyzer->getFaviconUrl();
        $this->assertEquals('http://www.1pagerank.com/favicon.ico', $ico);
    }
}