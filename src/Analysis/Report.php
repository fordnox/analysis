<?php
namespace Analysis;
use Analysis\Report\ReportRenderer;

class Report
{
    private $metrics = array();

    private $analyzer;

    private $domain;

    private $page;

    private $translation;

    private $renderer;

    /**
     * @return mixed
     */
    public function getRenderer()
    {
        if(!$this->renderer) {
            $this->renderer = new Report\Text();
        }
        return $this->renderer;
    }

    /**
     * @param mixed $renderer
     */
    public function setRenderer(ReportRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

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
        if(!$this->translation) {
            $this->translation = new Translation\En();
        }
        return $this->translation;
    }

    public function setAnalyzer(Analyzer $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    public function getAnalyzer()
    {
        if(!$this->analyzer) {
            $this->analyzer = new Analyzer();
        }
        $this->analyzer->setPage($this->getPage());
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
            $metric->setPage($this->getPage());
            $metric->setAnalyzer($this->getAnalyzer());
            $metric->setTranslation($this->getTranslation());

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

    //@todo remove namespace dependency
    protected function _getMetrics()
    {
        $classes = array();
        $list = glob(dirname(__FILE__).'/Metric/*.php');
        foreach($list as $file) {
            $classes[] = '\\Analysis\\Metric\\'.pathinfo($file, PATHINFO_FILENAME);
        }
        return $classes;
    }

    public function render()
    {
        $renderer = $this->getRenderer();
        $this->generate();
        $renderer->setReport($this);
        return $renderer->getOutput();
    }
}