<?php

namespace RentBike\Modules\Payment\Strategy;

use RentBike\Modules\Payment\Domain\Payment;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;

interface PaymentStrategyInterface
{
    public function process(PaymentDTO $paymentDTO): Payment;
}
