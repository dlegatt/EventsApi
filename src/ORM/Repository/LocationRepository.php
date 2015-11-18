<?php

namespace App\ORM\Repository;

use App\ORM\Entity\EntityInterface;
use App\ORM\Factory\LocationFactory;
use Doctrine\DBAL\Connection;

class LocationRepository implements RepositoryInterface
{
    /**
     * @var Connection
     */
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM location WHERE id = ?';
        $result = $this->db->fetchAssoc($sql,[$id]);
        return LocationFactory::createFromArray($result);
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