<?php

namespace App\Models;

use PDO;

class ArtistsModel
{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getArtists(): array
    {
        $query = $this->db->prepare('SELECT * FROM `artists`');
        $query->execute();
        return $query->fetchAll();
    }

    public function getArtist($id)
    {
        $query = $this->db->prepare('SELECT * FROM `artists` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }
}