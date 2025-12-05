<?php

namespace RentBike\Modules\Shared\Infrastructure\Repository;

use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;

interface RepositoryInterface
{
    public function save(Entity $entity): void;

    public function findById(Id $id): Entity;
}
