<?php

namespace App\ORM\Repository;

use App\ORM\Entity\EntityInterface;
use App\ORM\Entity\Event;
use Doctrine\DBAL\Connection;

abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $class = get_class($this);
        echo $class;
        echo "\n";
        $class =  ltrim($class,__NAMESPACE__);
        echo $class;
        $entity = substr($class,0,stripos($class,'Repository'));
        echo "\n";
        echo $entity;

        $methods = get_class_methods('App\ORM\Entity\\'.$entity);
        foreach ($methods as $key => $val) {
            if (stripos($val, 'set') === false) {
                unset($methods[$key]);
            } else {
                $methods[$key] = strtolower(substr($val,3));
            }
        }

        print_r($methods);

        $reflect = new \ReflectionClass('App\ORM\Entity\\'.$entity);
        $fields = [];
        foreach ($reflect->getProperties() as $prop){
            $fields[] = $prop->name;
        }
        print_r($fields);
        die();
        $this->db = $db;
    }

}