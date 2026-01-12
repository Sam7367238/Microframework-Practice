<?php

use Slim\App;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return function (App $app, Twig $twig): void {
    $app -> addRoutingMiddleware();
    $app -> addErrorMiddleware(displayErrorDetails: true, logErrors: true, logErrorDetails: true);
    $app -> add(TwigMiddleware::create($app, $twig));
};