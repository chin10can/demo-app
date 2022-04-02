<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use DI\ContainerBuilder;
use Shipfusion\Shipfusion;

require __DIR__ . '/../vendor/autoload.php';

//path to settings file
$settingsPath = require(__DIR__ . '/../app/Config/settings.php');
// Instantiate PHP-DI ContainerBuilder and app
$containerBuilder = new ContainerBuilder();
$app = AppFactory::create();
$container = $containerBuilder->build();
//Setting the container instance
AppFactory::setContainer($container);
//Setting the settings
$container->set('settings', $settingsPath);
//Setting the Eloquent ORM
$container->set('db', function ($container)use ($settingsPath) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($settingsPath['settings']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
});

//Initiating the Eloquent ORM
$container->get('db');
//Adding the routes
$routeFiles = (array) glob(__DIR__ . '/../app/Routes' . DIRECTORY_SEPARATOR . '*.php');
foreach($routeFiles as $routeFile) {
  (require_once $routeFile)($app);
}
$app->run();