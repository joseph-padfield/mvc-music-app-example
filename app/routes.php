<?php
declare(strict_types=1);

use App\Controllers\AlbumsController;
use App\Controllers\CoursesAPIController;
use App\Controllers\SongsController;
use Slim\App;
use Slim\Views\PhpRenderer;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Controllers\ArtistsController;

return function (App $app) {
    $container = $app->getContainer();

    //demo code - two ways of linking urls to functionality, either via anon function or linking to a controller

    $app->get('/', function ($request, $response, $args) use ($container) {
        $renderer = $container->get(PhpRenderer::class);
        return $renderer->render($response, "index.php", $args);
    });

    $app->get('/courses', CoursesAPIController::class);

    $app->get('/artists[/{id}]', ArtistsController::class);

    $app->get('/albums[/{id}]', AlbumsController::class);

    $app->get('/songs[/{id}]', SongsController::class);


};
