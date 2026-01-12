<?php

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver;
use Doctrine\DBAL\Tools\DsnParser;
use Framework\Database\ConnectionFactory;
use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Slim\Views\Twig;

return [
    App::class => function(ContainerInterface $c): App {
        AppFactory::setContainer($c);

        $app = AppFactory::create();

        $collector = $app -> getRouteCollector();
        $collector -> setDefaultInvocationStrategy(new RequestResponseArgs());

        return $app;
    },

    Twig::class => fn(): Twig => Twig::create(BASE_PATH . "/templates"),

    ConnectionFactory::class => function(): ConnectionFactory {
        $dsnParser = new DsnParser();
        $connectionParams = $dsnParser -> parse($_ENV["DATABASE_URL"]);

        return new ConnectionFactory($connectionParams);
    },

    Connection::class => fn(ContainerInterface $c): Connection|Driver => $c -> get(ConnectionFactory::class) -> create()
];