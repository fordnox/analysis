<?php
namespace Analysis\Report;
use Analysis\Report;

class Smarty implements ReportRenderer
{
    private $view;

    private $view_file = 'seo_report.tpl';

    public function setSmarty($smarty)
    {
        $this->view = $smarty;
    }

    public function setRenderFile($filename)
    {
        $this->view_file = $filename;
    }

    public function setReport(Report $report)
    {
        $this->report = $report;
    }

    public function getOutput()
    {
        $page = $this->report->getPage();

        $this->view->assign('page_title', 'SEO Report');
        $this->view->assign('url', $page->getUrl());
        $this->view->assign('report', $this->report);
        $this->view->assign('metrics', $this->report->getMetrics());
        $this->view->assign('description', $this->report->getDescription());
        return $this->view->fetch($this->view_file, null, null, null, false);
    }
}