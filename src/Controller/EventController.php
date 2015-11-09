<?php

namespace App\Controller;

use App\Model\EventModel;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class EventController
{
    public function allEvents(Application $app)
    {
        $model = new EventModel($app);
        return new JsonResponse($model->findAllEvents());
        $eventDir = __DIR__.'/../data/event/';
        $dir = opendir($eventDir);
        $files = [];

        while (false !== ($entry = readdir($dir))) {
            if ($entry !== '.' && $entry !== '..') {
                $event = file_get_contents($eventDir.$entry);
                $event = str_replace(["\r", "\n", "\t"], '', $event);
                $files[] = json_decode($event);
            }
        }
        return new JsonResponse($files);
    }

    public function eventDetails($id, Application $app)
    {
        $model = new EventModel($app);
        return new JsonResponse($model->findEvent($id));
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