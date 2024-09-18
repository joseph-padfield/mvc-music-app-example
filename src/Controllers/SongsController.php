<?php

namespace App\Controllers;

use App\Models\SongsModel;
use Slim\Views\PhpRenderer;

class SongsController
{
    private SongsModel $model;
    private PhpRenderer $renderer;

    public function __construct(SongsModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke($request, $response, $args)
    {
        if(isset($args['id']))
        {
            $song = $this->model->getSong(intval($args['id']));
            return $this->renderer->render($response, "song.phtml", ['song' => $song]);
        }
        else
        {
            return $this->renderer->render($response, "songs.phtml", ['songsArray' => $this->model->getSongs()]);
        }
    }
}