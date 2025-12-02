<?php

namespace RentBike\Modules\Payment\Strategy;

use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Payment\Domain\Payment;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;
use RentBike\Modules\Shared\Domain\ValueObject\Id;

readonly class PagarmePayment implements PaymentStrategyInterface
{
    public function process(PaymentDTO $paymentDTO): Payment
    {
        // process payment
        return new Payment(new Id('PAY_TESTE_123'));
    }
}
