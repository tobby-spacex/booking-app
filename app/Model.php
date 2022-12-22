<?php

namespace App;

use App\Database;

abstract class Model
{
    protected $pdo;

    public function __construct()
    {
        return $this->pdo = Database::connection();
    }
}
