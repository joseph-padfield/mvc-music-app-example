<?php

namespace App\Models;

use PDO;
class AlbumsModel
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAlbums(): array
    {
        $query = $this->db->prepare('SELECT * FROM albums');
        $query->execute();
        return $query->fetchAll();
    }

    public function getAlbum($id)
    {
        $query = $this->db->prepare('SELECT * FROM `albums` WHERE `id` = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function getAlbumsByArtist($artist_id)
    {
        $query = $this->db->prepare('SELECT * FROM `albums` WHERE `artist_id` = :artist_id');
        $query->execute(['artist_id' => $artist_id]);
        return $query->fetchAll();
    }
}