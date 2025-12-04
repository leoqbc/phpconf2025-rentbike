<?php

// Container Definitions

use RentBike\Modules\Controller\PaymentController;
use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Payment\Infrastructure\PaymentRepository;
use RentBike\Modules\Payment\Strategy\PagarmePayment;

return [
    // Services
    PaymentService::class => fn($c)
        => new PaymentService(new PagarmePayment(), new PaymentRepository()),

    // Controllers
    PaymentController::class => fn($c)
        => new PaymentController($c->get(PaymentService::class)),
];