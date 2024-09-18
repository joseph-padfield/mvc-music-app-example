<?php

namespace App\Controllers;

use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use Slim\Views\PhpRenderer;

class ArtistsController
{
    private ArtistsModel $model;
    private PhpRenderer $renderer;
    private AlbumsModel $albumsModel;

    public function __construct(ArtistsModel $model, PhpRenderer $renderer, AlbumsModel $albumsModel)
    {
        $this->model = $model;
        $this->renderer = $renderer;
        $this->albumsModel = $albumsModel;
    }

    public function __invoke($request, $response, $args)
    {
        if(isset($args['id']))
        {
            $artist = $this->model->getArtist(intval(($args['id'])));
            return $this->renderer->render($response, "artist.phtml", ['artist' => $artist, 'albumsArray' => $this->albumsModel->getAlbumsByArtist(intval(($args['id'])))]);
        }
        else
        {
            return $this->renderer->render($response, "artists.phtml", ['artistsArray' => $this->model->getArtists()]);
        }
    }
}