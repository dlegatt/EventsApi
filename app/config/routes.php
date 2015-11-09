<?php
# ./app/config/routes.php

use App\Provider\HelloControllerProvider;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$app->mount('/', new \App\Provider\EventControllerProvider());
