<?php

date_default_timezone_set('America/New_York');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

require_once __DIR__ . '/../vendor/autoload.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'http://www.google.com/doodles/about';

$page = new Analysis\Page();
$page->setUrl($url);

$report = new Analysis\Report();
$report->setPage($page);
print $report->render();