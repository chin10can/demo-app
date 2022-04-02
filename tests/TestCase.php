<?php

declare(strict_types=1);

namespace Tests;

use DI\ContainerBuilder;
use Exception;
use PHPUnit\Framework\TestCase as PHPUnit_TestCase;
use Slim\App;
use Slim\Factory\AppFactory;


class TestCase extends PHPUnit_TestCase
{

    /**
     * @return App
     * @throws Exception
     * [Initialise the app instace for testing]
     */
    protected function getAppInstance(): App
    {
        $settingsPath = require(__DIR__ . '/../app/Config/settings.php');
        $containerBuilder = new ContainerBuilder();
        $app = AppFactory::create();
        $container = $containerBuilder->build();
        AppFactory::setContainer($container);
        $container->set('settings', $settingsPath);
        $container->set('db', function ($container)use ($settingsPath) {
            $capsule = new \Illuminate\Database\Capsule\Manager;
            $capsule->addConnection($settingsPath['settings']['db']);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            return $capsule;
        });
        $container->get('db');
        $routeFiles = (array) glob(__DIR__ . '/../app/Routes' . DIRECTORY_SEPARATOR . '*.php');
        foreach($routeFiles as $routeFile) {
        (require_once $routeFile)($app);
        }
        return $app;
    }
}