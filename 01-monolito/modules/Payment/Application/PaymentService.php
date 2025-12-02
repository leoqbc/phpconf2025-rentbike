<?php

namespace RentBike\Modules\Payment\Application;
use RentBike\Modules\Payment\Strategy\PaymentStrategyInterface;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;
use RentBike\Modules\Shared\Domain\Entity;
use RentBike\Modules\Shared\Infrastructure\Repository\RepositoryInterface;

class PaymentService implements PaymentServiceInterface
{
    public function __construct(
        protected PaymentStrategyInterface $paymentStrategy,
        protected RepositoryInterface $repository
    ) {
    }

    public function process(PaymentDTO $payment): void
    {
        $paymentEntity = $this->paymentStrategy->process($payment);
        $this->repository->save($paymentEntity);
    }
}
