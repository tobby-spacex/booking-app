<?php

declare(strict_types = 1);

namespace App;

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;

class AutoMailer
{
    public static function mailSend($email): void
    {
        $transport = Transport::fromDsn($_ENV['MAILER_DSN']);
        $mailer = new Mailer($transport);
        $mailer->send($email);
    }
}