<?php

namespace App\Controllers;

use App\View;

class RoomsController
{
    public function room(): View
    {
        return View::make('rooms/room1');
    }
}
