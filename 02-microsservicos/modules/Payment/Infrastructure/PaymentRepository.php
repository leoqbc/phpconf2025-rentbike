<?php

namespace RentBike\Modules\Payment\Infrastructure;

use RentBike\Modules\Payment\Domain\Payment;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;

class PaymentRepository implements RepositoryInterface
{
    // Injeção de um PDO ou Strategy de Pesistencia

    public function save(Entity $entity): void
    {
        // TODO: Implement save() method.
    }

    public function findById(Id $id): Entity
    {
        return new Payment(new Id('PAY_CODE_TEST_FIND'));
    }
}
