<?php

namespace App\Provider;

use Silex\Application;
use Silex\ControllerProviderInterface;

class EventControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $controllers->get('/data/event/{id}', 'App\Controller\EventController::eventDetails');
        $controllers->post('/data/event/{id}', 'App\Controller\EventController::saveEvent');
        $controllers->match('/data/event/', 'App\Controller\EventController::allEvents')
            ->method('GET|OPTIONS');

        return $controllers;
    }
}