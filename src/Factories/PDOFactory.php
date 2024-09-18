<?php

namespace App\Factories;
use PDO;

class PDOFactory
{
    public function __invoke()
    {
        $options =
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
        return new PDO('mysql:host=db;dbname=music;','root', 'password');
    }
}