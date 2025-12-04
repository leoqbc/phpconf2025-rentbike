<?php

namespace RentBike\Modules\Reservation\Application;

use RentBike\Modules\Shared\Domain\ValueObject\Id;

class ReservationDto
{
    public string $externalPaymentId;

    public Id $userId;

    public Id $stockId;

    public int $days;

    public string $deliveryDate;

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
