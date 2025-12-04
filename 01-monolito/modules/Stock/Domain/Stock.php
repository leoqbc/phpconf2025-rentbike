<?php

namespace RentBike\Modules\Stock\Domain;

use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Stock\Domain\Enum\Status;

class Stock extends Entity
{
    public Id $motorcycleId;

    public int $dailyPrice = 1200;

    public Status $status = Status::AVAILABLE;

    public function fill(array $data): void
    {
        $this->id = new Id($data['id']);
        $this->motorcycleId = new Id($data['motorcycle_id']);
        $this->dailyPrice = $data['daily_price'];
        $this->status = Status::from($data['status']);
    }
}
