<?php

namespace RentBike\Modules\Reservation\Domain;

use RentBike\Modules\Reservation\Domain\Exception\CreateReservationException;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;

class Reservation extends Entity
{
    public string $externalPaymentId;

    public Id $userId;

    public Id $stockId;

    public int $days;

    public string $deliveryDate;

    protected bool $error = false;

    /**
     * @return void
     * @throws CreateReservationException
     */
    public function canBeCreated(): void
    {
        // regras de negócio aqui
        if ($this->error) {
            throw new CreateReservationException();
        }
    }

    public function fill(array $data)
    {
        $this->userId = new Id($data['user_id']);
        $this->stockId = new Id($data['stock_id']);
        $this->days = $data['days'];
        $this->deliveryDate = $data['delivery_date'];
    }

    public function toArray(): array
    {
        return [
            'external_payment_id' => $this->externalPaymentId,
            'user_id' => $this->userId->getValue(),
            'stock_id' => $this->stockId->getValue(),
            'days' => $this->days,
            'delivery_date' => $this->deliveryDate
        ];
    }
}
