<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RentBike\Modules\Payment\Application\PaymentService;
use RentBike\Modules\Payment\Infrastructure\PaymentRepository;
use RentBike\Modules\Payment\Strategy\PagarmePayment;
use RentBike\Modules\Reservation\Application\ReservationService;
use RentBike\Modules\Reservation\Infrastructure\ReservationRepository;
use RentBike\Modules\Shared\Application\PaymentServiceInterface;
use RentBike\Modules\Stock\Application\StockService;
use RentBike\Modules\User\Application\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ReservationService::class, function ($container) {
            return new ReservationService(
                new ReservationRepository(),
                $container->get(PaymentServiceInterface::class),
                new StockService(),
                new UserService()
            );
        });

        $this->app->bind(PaymentServiceInterface::class, function () {
            return new PaymentService(
                new PagarmePayment(),
                new PaymentRepository()
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
