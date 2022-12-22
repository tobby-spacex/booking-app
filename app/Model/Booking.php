<?php

namespace App\Model;

use App\Database;
use App\Model;

class Booking extends Model
{
    public function create()
    {
        $name = 'Maks';
        $email = 'maks@gmail.com';
        $phone = '78945';
        $time = '11:30';

        $query = 'INSERT into room_one (name, email, phone, time)
                  VALUES (?, ?, ?, ?)';
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$name, $email, $phone, $time]);
    }
}
