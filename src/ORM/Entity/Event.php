<?php

namespace App\ORM\Entity;

class Event implements EntityInterface, \JsonSerializable
{
    private $id;
    private $name;
    private $date;
    private $time;
    private $imageUrl;

    /**
     * @var Location
     */
    private $location;
    private $location_id;

    public function __construct($id = null, $name = null, $date = null, $time = null,
                                $imageUrl = null, Location $location = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date = $date;
        $this->time = $time;
        $this->imageUrl = $imageUrl;
        $this->location = $location;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return null
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return null
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @param $imageUrl
     * @return $this
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param $location
     * @return $this
     */
    public function setLocation(Location $location)
    {
        if ($location->getId() !== null) {
            $this->setLocationId($location->getId());
        }
        $this->location = $location;
        return $this;
    }

    private function setLocationId($id)
    {
        $this->location_id = $id;
    }

    private function getLocationId()
    {
        return $this->location_id;
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}