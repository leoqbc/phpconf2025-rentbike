<?php

namespace RentBike\Modules\Reservation\Application;

use Ramsey\Uuid\Uuid;
use RentBike\Modules\Reservation\Domain\Exception\CreateReservationException;
use RentBike\Modules\Reservation\Domain\Reservation;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;

readonly class ReservationService
{
    public function __construct(
        protected RepositoryInterface $repository,
        protected PaymentServiceInterface $paymentService
    ) {
    }

    /**
     * @param Reservation $reservation
     * @return Reservation
     * @throws CreateReservationException
     */
    public function create(Reservation $reservation): Reservation
    {
        try {
            // Domain Validation: Regras de negócio
            $reservation->canBeCreated();

            $paymentDTO = new PaymentDTO();
            $paymentDTO->id = Uuid::uuid7()->toString();

            // Processamento do pagamento / PaymentServiceInterface em Shared
            $this->paymentService->process($paymentDTO);

            // Infrastructure: salvando a reserva (banco local)
            $this->repository->save($reservation);

            return $reservation;
        } catch (\Exception $exception) {
            throw new CreateReservationException($exception->getMessage());
        }
    }

}
