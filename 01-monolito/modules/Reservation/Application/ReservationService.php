<?php

namespace RentBike\Modules\Reservation\Application;

use RentBike\Modules\Reservation\Domain\Exception\CreateReservationException;
use RentBike\Modules\Reservation\Domain\Reservation;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;
use RentBike\Modules\Stock\Application\StockService;
use RentBike\Modules\User\Application\UserService;

readonly class ReservationService
{
    public function __construct(
        protected RepositoryInterface $repository,
        protected PaymentServiceInterface $paymentService,
        protected StockService $stockService,
        protected UserService $userService
    ) {
    }

    /**
     * @param ReservationDto $reservationDto
     * @return Reservation
     * @throws CreateReservationException
     */
    public function create(ReservationDto $reservationDto): Reservation
    {
        $user = $this->userService->getUser($reservationDto->userId);
        $stock = $this->stockService->getStock($reservationDto->stockId);

        $reservationEntity = new Reservation($user, $stock, $reservationDto->days);

        // Domain Validation: Regras de negócio de Reservation
        $reservationEntity->canBeCreated();

        // Payment Data
        $paymentDTO = new PaymentDTO();
        $paymentDTO->externalId = $reservationEntity->externalPaymentId;
        $paymentDTO->amount = $reservationEntity->getRentCost();

        // Processamento do pagamento / PaymentServiceInterface em Shared
        $this->paymentService->process($paymentDTO);

        // Infrastructure: salvando a reserva (banco local)
        $this->repository->save($reservationEntity);

        return $reservationEntity;
    }

}
