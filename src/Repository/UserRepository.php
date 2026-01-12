<?php

namespace App\Repository;

use Doctrine\DBAL\Connection;

class UserRepository {
    public function __construct(private Connection $connection) {}

    public function findAll(): void {
        $this -> connection -> executeQuery("SELECT * FROM Users;");
    }
}
