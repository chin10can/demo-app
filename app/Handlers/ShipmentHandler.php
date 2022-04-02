<?php
namespace App\Handlers;

use App\Controllers\ShipmentController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShipmentHandler 
{
    protected $controller;
    public function __construct()
    {
       $this->controller = new ShipmentController();
    }
    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return Response
     */
    public function getAll(Request $request, Response $response, $args):Response
    {
        $users = $this->controller->getAll();
        $response->getBody()->write($users['data']['shipments']);
        return $response;
    }
    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return Response
     */
    public function getUserForShipment(Request $request, Response $response, $args):Response
    {
        $user = $this->controller->getUserForShipment($args['id']);
        $response->getBody()->write($user['data']['user']);
        return $response;
    }
   
}