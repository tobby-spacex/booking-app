<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;

class BaseController
{
    public function index(): View
    {
       return View::make('index', ['dataforview' => 'some data']);
    }
}
