<?php

namespace Framework\Database;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

final readonly class ConnectionFactory
{
    public function __construct(private array $databaseUrl) {}

    public function create(): Connection {
        return DriverManager::getConnection($this -> databaseUrl);
    }
}
