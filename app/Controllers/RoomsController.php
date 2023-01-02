<?php

namespace App\Controllers;

use App\View;
use App\AutoMailer;
use App\Model\Booking;
use Valitron\Validator;
use Symfony\Component\Mime\Email;

session_start();

class RoomsController
{
    private $requestedTime;

    private $bookingModel;

    private $bookedTime;

    public function room(): View
    {
        return View::make('rooms/room1');
    }

    public function booking()
    {
        $this->bookingModel = new Booking();

        if(isset($_POST)){
            $bookingData =  $_POST;    
        }

        $previousUrl = $bookingData['url'];
        $this->requestedTime = $bookingData['time'];

        unset($bookingData['url']);

        $v = new Validator($bookingData);
        $v->rule('required', ['name', 'email', 'phone']);
        $v->rule('email', 'email');

        $v->rule(function($field, $value, $params, $fields) {
            $this->bookedTime = $this->bookingModel->isBooked($this->requestedTime);
            $isBooked = true;
            if(!empty($this->bookedTime)) {
                $isBooked = false;
            }
                return $isBooked;

        }, "time")->message("The current time has already been booked");

        if($v->validate()) {
            $_SESSION['success'] =  "Yay! We're all good!";

            $email = (new Email())
            ->from('arman@example.com')
            ->to($bookingData['email'])
            ->subject('Office booked!')
            ->text('Hi, you have booked office. Reserved time is ' . $bookingData['time'])
            ->html('<p>Please share our service with your friends.</p>');
            AutoMailer::mailSend($email);

        } else {
            $_SESSION['error'] = $v->errors();
            $_SESSION['booked_person'] = isset($this->bookedTime) ? $this->bookedTime : null;
        }

        header("Location: $previousUrl");
    }
}
