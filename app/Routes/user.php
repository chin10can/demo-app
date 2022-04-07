<?php
namespace App\Routes;
//routes for users

use App\Handlers\DataHandler;
use Slim\App;
use App\Handlers\UserHandler;
return static function(App $app) {
    $app->get('/', [UserHandler::class, 'getAll']);
    $app->get('/{id}', [UserHandler::class, 'getOne']);
    $app->get('/user-shipments/{id}', [UserHandler::class, 'getUserWithShipments']);
    $app->get('/data/get', [DataHandler::class, 'dataHandler']);
};