<?php

require_once(__DIR__.'/../vendor/autoload.php');

use Ynov\Application;



require_once(__DIR__.'/../src/templates/index.html.php');
$application = new Application();
$application->bootstrap();
