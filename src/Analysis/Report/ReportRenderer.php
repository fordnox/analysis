<?php
namespace Analysis\Report;
use Analysis\Report;

interface ReportRenderer
{
    public function setReport(Report $report);

    public function getOutput();
}