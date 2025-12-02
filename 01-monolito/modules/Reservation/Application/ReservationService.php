<?php

namespace RentBike\Modules\Reservation\Application;

use Ramsey\Uuid\Uuid;
use RentBike\Modules\Reservation\Domain\Exception\CreateReservationException;
use RentBike\Modules\Reservation\Domain\Reservation;

readonly class ReservationService
{
    /**
     * @param Reservation $reservation
     * @return Reservation
     * @throws CreateReservationException
     */
    public function create(Reservation $reservation): Reservation
    {
        try {
            // Define an external id to retrieve payment
            $reservation->externalPaymentId = Uuid::uuid7()->toString();

            // Domain Validation: Regras de negócio
            $reservation->canBeCreated();

            // 1. Payment Data

            // 2. Processamento do pagamento / PaymentServiceInterface em Shared

            // 3. Infrastructure: salvando a reserva (banco local)


            return $reservation;
        } catch (\Exception $exception) {
            throw new CreateReservationException($exception->getMessage());
        }
    }

}
