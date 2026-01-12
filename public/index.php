<?php

define("BASE_PATH", dirname(__DIR__));

require(BASE_PATH . "/vendor/autoload.php");

$app = require(BASE_PATH . "/Framework/bootstrap.php");

$routes = require(BASE_PATH . "/config/routes.php");
$routes($app);

$app -> run();