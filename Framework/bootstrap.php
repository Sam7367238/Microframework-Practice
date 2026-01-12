<?php

use DI\ContainerBuilder;
use Dotenv\Dotenv;
use Slim\App;
use Slim\Views\Twig;

$builder = new ContainerBuilder();
$container = $builder -> addDefinitions(BASE_PATH . "/config/services.php") -> build();

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv -> load();

$app = $container -> get(App::class);
$twig = $container -> get(Twig::class);

$middlewareBootstrap = require(BASE_PATH . "/config/middleware.php");
$middlewareBootstrap($app, $twig);

return $app;