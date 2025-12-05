<?php

namespace RentBike\Modules\Shared\Application;

use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;

interface PaymentServiceInterface
{
    public function process(PaymentDTO $payment): void;
}
