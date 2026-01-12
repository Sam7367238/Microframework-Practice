<?php

use Slim\Views\TwigMiddleware;

$app -> addRoutingMiddleware();
$app -> addErrorMiddleware(displayErrorDetails: true, logErrors: true, logErrorDetails: true);
$app -> add(TwigMiddleware::create($app, $twig));