<?php

use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Payment\Controller\PaymentController;
use RentBike\Modules\Payment\Infrastructure\PaymentRepository;
use RentBike\Modules\Payment\Strategy\PagarmePayment;

return [
    // Controller
    PaymentController::class => fn($c) => new PaymentController($c->get(PaymentService::class)),

    // Services
    PaymentService::class => fn() => new PaymentService(new PagarmePayment(), new PaymentRepository())
];
