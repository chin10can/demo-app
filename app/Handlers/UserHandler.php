<?php
namespace App\Handlers;

use App\Controllers\IndexController;
use App\Events\NewUserCreatedEvent;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use League\Event\EventDispatcher;
use App\Listeners\NewUserCreatedListener;
class UserHandler 
{
    protected $controller;
    protected $dispatcher;
    public function __construct()
    {
       $this->controller = new IndexController();
       $eventDispatcher = new EventDispatcher();
       //Event and Listener binding. so when event is triggered, associated listener will be invoked
       $eventDispatcher->subscribeTo(NewUserCreatedEvent::class, new NewUserCreatedListener());
        $this->dispatcher = $eventDispatcher;
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
        $this->dispatcher->dispatch(new NewUserCreatedEvent('This is the data'));
        $response->getBody()->write($users['data']['users']);
        return $response;
    }
    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return Response
     */
    public function getOne(Request $request, Response $response, $args):Response
    {
        $user = $this->controller->getOne($args['id']);
        $response->getBody()->write($user['data']['user']);
        return $response;
    }
    /**
     * @param Request $request
     * @param Response $response
     * @param mixed $args
     * 
     * @return Response
     */
    public function getUserWithShipments(Request $request, Response $response, $args):Response
    {
        $userData = $this->controller->getUserWithShipments($args['id']);
        $response->getBody()->write($userData['data']);
        return $response;
    }
}