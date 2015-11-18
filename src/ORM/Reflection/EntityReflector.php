<?php

namespace App\ORM\Reflection;

class EntityReflector
{
    public static function getFields($entityClass)
    {
        $entityReflect = new \ReflectionClass($entityClass);
        $fields = [];
        foreach ($entityReflect->getProperties() as $prop){
            $fields[] = $prop->name;
        }
        return $fields;
    }
}