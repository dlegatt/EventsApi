<?php

namespace App\ORM\Factory;

use App\ORM\Entity\Location;
use App\ORM\Entity\Event;

class EventFactory
{
    public static function create($id, $name, $date,$time,$imageUrl,Location $location)
    {
        return new Event($id,$name,$date, $time,$imageUrl,$location);
    }

    public static function createFromArray(array $data)
    {
        $valid = true;
        foreach (['name','date','time','image_url','location'] as $key){
            if (array_key_exists($key,$data) === false) {
                $valid = false;
                break;
            }
        }

        if ($valid) {
            $event = (new Event())
                ->setName($data['name'])
                ->setDate($data['date'])
                ->setTime($data['time'])
                ->setImageUrl($data['image_url'])
                ->setLocation($data['location'])
            ;
            if (array_key_exists('id',$data))
            {
                $event->setId($data['id']);
            }
            return $event;
        } else {
            return false;
        }
    }
}