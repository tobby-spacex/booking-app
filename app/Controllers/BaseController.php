<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

class BaseController
{
    public function index()
    {
        // $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
        // $mailer = new Mailer($transport);
    
        $email = (new Email())
        ->from('hello@example.com')
        ->to('you@example.com')
        ->subject('Time for Symfony Mailer!')
        ->text('Sending emails is fun again!')
        ->html('<p>See Twig integration for better HTML integration!</p>');

        // $mailer->send($email);

       return View::make('index', ['dataforview' => 'some data']);
    }
}
