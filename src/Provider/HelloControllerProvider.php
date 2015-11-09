<?php
# ./src/Provider/HelloCotrollerProvider.php

namespace App\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

class HelloControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/', 'App\Controller\HelloController::index');

        $controllers->get('/{name}', 'App\Controller\HelloController::name');

        return $controllers;
    }
}