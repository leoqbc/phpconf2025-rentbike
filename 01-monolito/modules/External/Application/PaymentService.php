<?php

namespace RentBike\Modules\External\Application;

use Illuminate\Support\Facades\Http;
use RentBike\Modules\Shared\Application\DTOs\PaymentDTO;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{

    public function process(PaymentDTO $payment): void
    {
        $response = Http::post(getenv('PAYMENT_URL') . '/process', [
            'externalId' => $payment->externalId,
            'amount' => $payment->amount,
        ]);
    }
}
