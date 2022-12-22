<?php

namespace App\Controllers;

use App\View;
use App\Model\Booking;

class RoomsController
{
    public function room(): View
    {
        return View::make('rooms/room1');
    }

    public function booking()
    {
        $booking = new Booking();
        $booking->create();
        
        echo '<pre>';
        var_dump($_POST);
    }
}
