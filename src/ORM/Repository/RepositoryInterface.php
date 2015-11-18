<?php

namespace App\ORM\Repository;

use Doctrine\DBAL\Connection;
use App\ORM\Entity\EntityInterface;

interface RepositoryInterface
{
    public function __construct(Connection $db);
    public function find($id);
    public function findAll();
    public function create(EntityInterface $entity);
    public function update(EntityInterface $entity);
    public function delete($id);
}