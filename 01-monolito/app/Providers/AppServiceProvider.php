<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Payment\Infrastructure\PaymentRepository;
use RentBike\Modules\Payment\Strategy\PagarmePayment;
use RentBike\Modules\Reservation\Application\ReservationService;
use RentBike\Modules\Reservation\Infrastructure\ReservationRepository;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Adicionar dependências ReservationService::class

        // Adicionar dependências PaymentServiceInterface::class
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
