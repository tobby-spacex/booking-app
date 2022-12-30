<?php

namespace App\Controllers;

use App\View;
use App\Model\Booking;
use Valitron\Validator;

session_start();

class RoomsController
{
    public function room(): View
    {
        return View::make('rooms/room1');
    }

    public function booking()
    {
        if(isset($_POST)){
            $bookingData =  $_POST;    
        }

        $previousUrl = $bookingData['url'];

        unset($bookingData['url']);

        $v = new Validator($bookingData);
        $v->rule('required', ['name', 'email', 'phone']);
        $v->rule('email', 'email');
        if($v->validate()) {
            $_SESSION['success'] =  "Yay! We're all good!";
        } else {
            $_SESSION['error'] = $v->errors();
            // print_r($v->errors());
            // throw new ValidationException($v->errors());
        }

        header("Location: $previousUrl");
        $booking = new Booking();
        $booking->create($bookingData);        
    }
}
