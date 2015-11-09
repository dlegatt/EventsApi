<?php
# ./src/Controller/HelloController.php

namespace App\Controller;

use Silex\Application;

class HelloController
{
    public function index(Application $app)
    {
        return $app['twig']->render('Hello.html.twig',['name'=>'World!']);
    }

    public function name($name, Application $app)
    {
        return $app['twig']->render('Hello.html.twig',['name'=>$name]);
    }
}