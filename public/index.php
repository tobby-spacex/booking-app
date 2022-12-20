<?php

declare(strict_types = 1);

use App\Router;
use App\Controllers\BaseController;

require_once __DIR__ . '/../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/', [BaseController::class, 'index'])
    ;

echo $router->resolve(
    $_SERVER['REQUEST_URI'],
    strtolower($_SERVER['REQUEST_METHOD'])
);
