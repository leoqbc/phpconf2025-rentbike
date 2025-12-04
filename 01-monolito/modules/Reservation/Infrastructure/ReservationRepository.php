<?php

namespace RentBike\Modules\Reservation\Infrastructure;

use RentBike\Modules\Reservation\Domain\Reservation;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;
use RentBike\Modules\Stock\Domain\Enum\Status;
use RentBike\Modules\Stock\Domain\Stock;
use RentBike\Modules\User\Domain\User;
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

        $stock = \App\Models\Stock::findOrFail($entity->stock->id->getValue());
        $stock->status = $entity->stock->status->value;
        $stock->saveOrFail();

        $entity->id = new Id($reservation['id']);
    }

    public function findById(Id $id): Entity
    {
        return new Reservation(new User(), new Stock(), 3);
    }
}
