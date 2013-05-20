<?php
namespace Analysis;
use Analysis\Page;
use Doc\Domain;

class Report
{
    private $metrics = array();

    private $analyzer;

    private $domain;

    private $page;

    private $translation;

    public function getDescription()
    {
        return "
        <p>
        This report provides a review of the key factors that influence the SEO and usability of your website.
        The homepage rank is a grade on a 1000-point scale that represents your Internet Marketing
        Effectiveness. The algorithm is based on 70 criteria including search engine data, website structure,
        site performance and others. A rank lower than 100 means that there are a lot of areas to improve. A
        rank above 500 is a good mark and means that your website is probably well optimized.
        </p>

        <p>
        Our reports provide actionable advice to improve a site's business objectives.
        Please contact us for more information.
        </p>
        ";
    }

    public function setTranslation($translation)
    {
        $this->translation = $translation;
    }

    public function getTranslation()
    {
        return $this->translation;
    }

    public function setAnalyzer(Analyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    public function getAnalyzer()
    {
        return $this->analyzer;
    }

    public function setDomain(Domain $domain)
    {
        $this->domain = $domain;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function setPage(Page $page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function generate()
    {
        foreach($this->_getMetrics() as $mc) {
            $metric = new $mc();
            $metric->setPage($this->page);
            $metric->setAnalyzer($this->analyzer);
            $metric->setTranslation($this->translation);

            try {
                $metric->process();
                $this->metrics[$metric->getCategory()][] = $metric;
            } catch(Exception $e) {
                error_log($e);
            }

        }
    }

    public function getMetrics()
    {
        return $this->metrics;
    }

    protected function _getMetrics()
    {
        $classes = array();
        $list = glob(dirname(__FILE__).'/Metric/*.php');
        foreach($list as $file) {
            $classes[] = '\\Analysis\\Metric\\'.pathinfo($file, PATHINFO_FILENAME);
        }
        return $classes;
    }
}