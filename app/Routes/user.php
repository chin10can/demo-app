<?php
namespace App\Routes;
//routes for users
use Slim\App;
use App\Handlers\UserHandler;
return static function(App $app) {
    $app->get('/', [UserHandler::class, 'getAll']);
    $app->get('/{id}', [UserHandler::class, 'getOne']);
    $app->get('/user-shipments/{id}', [UserHandler::class, 'getUserWithShipments']);
};