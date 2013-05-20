<?php
namespace Analysis\Report;
use Analysis\Report;
use Doc\Domain;

class Html
{

    public function setReport(Report $report)
    {
        $this->report = $report;
    }

    public function setSmarty($smarty)
    {
        $this->view = $smarty;
    }

    public function getOutput()
    {
        $page = $this->report->getPage();
        $domain = $this->report->getDomain();
        $d = $domain->getDomain();

        $this->view->assign('domain_1pagerank', $domain->getRank1pagerank());
        $this->view->assign('page_title', $d.' SEO Report');
        $this->view->assign('domain', $d);
        $this->view->assign('url', $page->getUrl());
        $this->view->assign('report', $this->report);
        $this->view->assign('metrics', $this->report->getMetrics());
        $this->view->assign('description', $this->report->getDescription());
        return $this->view->fetch("frontend/pdf.tpl", null, null, null, false);
    }
}