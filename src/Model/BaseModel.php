<?php

namespace App\Model;

use Silex\Application;
use Doctrine\DBAL\Connection;

abstract class BaseModel
{
    protected $db;

    public function __construct(Application $app)
    {
        $this->db = $app['db'];
    }
}