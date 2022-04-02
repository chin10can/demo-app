<?php
namespace App\Routes;
//Routes for Shipments
use App\Handlers\ShipmentHandler;
use Slim\App;
return static function(App $app) {
    $app->get('/shipments', [ShipmentHandler::class, 'getAll']);
    $app->get('/shipments-user/{id}', [ShipmentHandler::class, 'getUserForShipment']);
};