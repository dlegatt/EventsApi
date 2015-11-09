<?php
# ./app/config/routes.php

use App\Provider\HelloControllerProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->mount('/hello', new HelloControllerProvider());

$app->get('/data/event/{id}', function ($id) use ($app) {
    $file = __DIR__.'/../../src/data/event/'.$id.'.json';
    if (file_exists($file)) {
        return new JsonResponse(
            json_decode(
                file_get_contents($file)
            )
        );
    } else {
        return new JsonResponse([
            'error' => 'Event with ID: '.$id.' not found'
        ], 404);
    }
});

$app->match('/data/event/{id}', function ($id, Request $request) use ($app) {
    $event = $request->getContent();
    $file = __DIR__.'/../../src/data/event/'.$id.'.json';
    $fh = fopen($file,'w+');
    fwrite($fh,$event);
    return new JsonResponse($event);
});

$app->match('/data/event/', function () use ($app) {
    $eventDir = __DIR__.'/../../src/data/event/';
    $dir = opendir(__DIR__.'/../../src/data/event/');
    $files = [];
    while (false !== ($entry = readdir($dir))) {
        if ($entry !== '.' && $entry !== '..') {
            $event = file_get_contents($eventDir.$entry);
            $event = str_replace(["\r","\n","\t"], '', $event);
            $files[] = json_decode($event);
        }
    }
    return new JsonResponse($files);
})->method('GET|OPTIONS');