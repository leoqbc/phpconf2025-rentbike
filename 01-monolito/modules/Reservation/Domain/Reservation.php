<?php

namespace RentBike\Modules\Reservation\Domain;

use Ramsey\Uuid\Uuid;
use RentBike\Modules\Reservation\Domain\Exception\CreateReservationException;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Domain\ValueObject\Id;
use RentBike\Modules\Stock\Domain\Enum\Status;
use RentBike\Modules\Stock\Domain\Stock;
use RentBike\Modules\User\Domain\User;

class Reservation extends Entity
{
    public string $externalPaymentId;

    public User $user;

    public Stock $stock;

    public int $days;

    public \DateTimeImmutable $deliveryDate;

    public function __construct(User $user, Stock $stock, int $days)
    {
        parent::__construct(null);
        $this->externalPaymentId = Uuid::uuid7()->toString();
        $this->user = $user;
        $this->stock = $stock;
        $this->days = $days;
        $this->deliveryDate = new \DateTimeImmutable()->modify("+$days day");
    }

    /**
     * @return void
     * @throws CreateReservationException
     */
    public function canBeCreated(): void
    {
        // regras de negócio aqui
        if ($this->stock->status !== Status::AVAILABLE) {
            throw new CreateReservationException("The motorcycle ID#{$this->stock->id->getValue()} has already been reserved.");
        }
        $this->stock->status = Status::RESERVED;
    }

    public function getRentCost(): int
    {
        $amount = ($this->stock->dailyPrice / 100) * $this->days;
        return round($amount, 2) * 100;
    }

    public function toArray(): array
    {
        return [
            'external_payment_id' => $this->externalPaymentId,
            'user_id' => $this->user->id->getValue(),
            'stock_id' => $this->stock->id->getValue(),
            'days' => $this->days,
            'delivery_date' => $this->deliveryDate->format('Y-m-d H:i:s'),
        ];
    }
}
