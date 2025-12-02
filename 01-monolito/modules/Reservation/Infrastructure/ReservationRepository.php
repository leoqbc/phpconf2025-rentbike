<?php

namespace RentBike\Modules\Reservation\Infrastructure;

use RentBike\Modules\Reservation\Domain\Reservation;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;
use Throwable;

class ReservationRepository implements  RepositoryInterface
{
    // Strategy de infra aqui

    /**
     * @param Reservation $entity
     * @return void
     * @throws Throwable
     */
    public function save(Entity $entity): void
    {
        // Implementação com pouca camada
        $reservation = new \App\Models\Reservation($entity->toArray());
        $reservation->saveOrFail();
    }

    public function findById(Id $id): Entity
    {
        return new Reservation();
    }
}
