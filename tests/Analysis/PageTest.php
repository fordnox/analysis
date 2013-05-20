<?php

class Analysis_PageTest extends PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->page = new Analysis\Page();
    }

    public static function provider()
    {
        return array(
            array('http://twitter.github.com/bootstrap/', 'twitter.github.com', 'http://twitter.github.com', 'github.com'),
            array('http://github.com/bootstrap/', 'github.com', 'http://github.com', 'github.com'),
            array('http://www.google.com/doodles/about', 'www.google.com', 'http://www.google.com', 'google.com'),
            array('https://www.google.com/doodles/about', 'www.google.com', 'https://www.google.com', 'google.com'),
            array('https://www.google.co.uk/doodles/about', 'www.google.co.uk', 'https://www.google.co.uk', 'google.co.uk'),
        );
    }

    /**
     * @dataProvider provider
     */
    public function testPage($url, $expected1, $expected2, $expected3)
    {
        $this->page->setUrl($url);
        $this->assertEquals($expected1, $this->page->getDomainName());
        $this->assertEquals($expected2, $this->page->getDomainLink());
        $this->assertEquals($expected3, $this->page->getSldTld());
    }

    public static function providerSldTld()
    {
        return array(
            array('https://www.google.com/doodles/about', 'google', '.com'),
            array('https://www.google.co.uk/doodles/about', 'google', '.co.uk'),
        );
    }

    /**
     * @dataProvider providerSldTld
     */
    public function testTldSld($url, $expected1, $expected2)
    {
        $this->page->setUrl($url);
        $this->assertEquals($expected1, $this->page->getDomainSld());
        $this->assertEquals($expected2, $this->page->getDomainTld());
        $this->assertEquals(ltrim($expected2, '.'), $this->page->getDomainTld(false));
    }
}