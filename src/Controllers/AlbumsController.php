<?php

namespace App\Controllers;

use App\Models\AlbumsModel;
use App\Models\SongsModel;
use Slim\Views\PhpRenderer;

class AlbumsController
{
    private AlbumsModel $model;
    private PhpRenderer $renderer;
    private SongsModel $songsModel;

    public function __construct(AlbumsModel $model, PhpRenderer $renderer, SongsModel $songsModel)
    {
        $this->model = $model;
        $this->renderer = $renderer;
        $this->songsModel = $songsModel;
    }

    public function __invoke($request, $response, $args)
    {
        if(isset($args['id']))
        {
            $album = $this->model->getAlbum(intval(($args['id'])));
            return $this->renderer->render($response, "album.phtml", ['album' => $album, 'songsArray' => $this->songsModel->getSongsByAlbum(intval($args['id']))]);
        }
        else
        {
            return $this->renderer->render($response, "albums.phtml", ['albumsArray' => $this->model->getAlbums()]);
        }
    }
}