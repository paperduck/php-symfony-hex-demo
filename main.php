<?php

require __DIR__.'/vendor/autoload.php';

use Command\ReportRevenue;
use Symfony\Component\Console\Application;

$app = new Application();

// register commands
$app->add(new ReportRevenue());

// start application
$app->run();

?>
