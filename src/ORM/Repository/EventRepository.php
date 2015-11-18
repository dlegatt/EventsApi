<?php

namespace App\ORM\Repository;

use App\ORM\Entity\EntityInterface;
use App\ORM\Factory\EventFactory;

class EventRepository extends AbstractRepository
{

    public function find($id)
    {
        $event = $this->db->fetchAssoc(
                'SELECT * FROM event WHERE id = ?',[$id]);
        $lr = new LocationRepository($this->db);
        $event['location'] = $lr->find($event['location_id']);
        return EventFactory::createFromArray($event);
    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
    }

    public function create(EntityInterface $entity)
    {
        // TODO: Implement create() method.
    }

    public function update(EntityInterface $entity)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

}