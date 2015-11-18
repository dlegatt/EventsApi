<?php

namespace App\Controller;

use App\Model\EventModel;
use App\ORM\Factory\LocationFactory;
use App\ORM\Entity\Location;
use App\ORM\Repository\EventRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EventController
{
    public function allEvents(Application $app)
    {
        $model = new EventModel($app);
        return new JsonResponse($model->findAllEvents());
    }

    public function eventDetails($id, Application $app)
    {
        $model = new EventModel($app);
        $event = $model->findEvent($id);
        if(! $event === false) {
            return new JsonResponse($model->findEvent($id));
        }
        return new JsonResponse(['errors' => [['message' => 'Entity with ID '.$id.' not found']]], 404);
        die();
        $file = __DIR__.'/../data/event/'.$id.'.json';
        if (file_exists($file)) {
            return new JsonResponse(
                json_decode(file_get_contents($file))
            );
        } else {
            return new JsonResponse([
                'error' => 'Event with ID: '.$id.' not found'
            ], 404);
        }
    }

    public function saveEvent($id, Request $request)
    {
        $event = $request->getContent();
        echo $event;
        die();
        $file = __DIR__.'/../data/event/'.$id.'.json';
        $fh = fopen($file, 'w+');
        fwrite($fh, $event);
        return new JsonResponse($event);
    }
}