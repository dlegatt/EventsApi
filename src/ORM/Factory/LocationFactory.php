<?php

namespace App\ORM\Factory;

use App\ORM\Entity\Location;

class LocationFactory
{
    public static function create($id, $address, $city, $province)
    {
        return new Location($id, $address, $city, $province);
    }

    public static function createFromArray(array $data)
    {
        $valid = true;
        foreach (['address','city','province'] as $key) {
            if (array_key_exists($key,$data) === false) {
                $valid = false;
                break;
            }
        }

        if ($valid) {
            $location = new Location();
            $location
                ->setAddress($data['address'])
                ->setCity($data['city'])
                ->setProvince($data['province']);
            if (array_key_exists('id',$data)) {
                $location->setId($data['id']);
            }
            return $location;
        } else {
            return false;
        }
    }
}