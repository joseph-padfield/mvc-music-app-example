<?php

namespace App\Models;

use PDO;

class SongsModel
{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getSongs(): array
    {
        $query = $this->db->prepare('SELECT * FROM `songs`');
        $query->execute();
        return $query->fetchAll();
    }

    public function getSong($id)
    {
        $query = $this->db->prepare('SELECT * FROM `songs` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function getSongsByAlbum($album_id)
    {
        $query = $this->db->prepare('SELECT * FROM `songs` WHERE `album_id` = :album_id');
        $query->execute(['album_id' => $album_id]);
        return $query->fetchAll();
    }
}