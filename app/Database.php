<?php

declare(strict_types = 1);

namespace App;

use PDO;

class Database
{
    public static function connection(): object
    {
        try {
            return new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" .  $_ENV['DB_DATABASE'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
    }
}
