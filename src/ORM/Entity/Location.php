<?php

namespace App\ORM\Entity;

class Location implements EntityInterface, \JsonSerializable
{
    private $id;
    private $address;
    private $city;
    private $province;

    public function __construct($id=null, $address=null, $city=null, $province=null)
    {
        $this->id = $id;
        $this->address = $address;
        $this->city = $city;
        $this->province = $province;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function __toString()
    {
        return sprintf('%s %s, %s',
            $this->address, $this->city, $this->province);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}