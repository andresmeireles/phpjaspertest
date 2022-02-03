<?php

use PhpJasperLearn\ReportMaker;

require __DIR__ . '/vendor/autoload.php';

$report = new ReportMaker();

//$report->compile();
//$report->make();

//$report->param();
$report->generateWithParans();