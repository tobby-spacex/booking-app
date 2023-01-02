<?php

namespace App\Model;

use App\Model;

class Booking extends Model
{
    public function create(array $bookingData)
    {

        foreach ($bookingData as $key => $value) {
            $$key = $bookingData[$key];
        }

        try {
            $query = 'INSERT into room_one (name, email, phone, time)
            VALUES (:name, :email, :phone, :time)';
  
            $stmt = $this->pdo->prepare($query);

            $stmt->bindParam(':name',  $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':time',  $time);
            $stmt->execute();
            
        } catch (\PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                echo 'duplicate error ' . 'the time ' . $time . ' already booked';
             } else {
                echo 'error';
             }
        }
    }

    public function isBooked(string $requestedTime)
    {
        $param =  '%' . $requestedTime . '%';

        $query = "SELECT * FROM room_one WHERE time LIKE ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array($param));

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
