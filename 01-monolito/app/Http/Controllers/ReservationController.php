<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RentBike\Modules\Reservation\Application\ReservationService;
use RentBike\Modules\Reservation\Domain\Reservation;

class ReservationController extends Controller
{
    public function __construct(
        public ReservationService $reservationService
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $reservation = new Reservation();

            // Validar input
            $request->validate([
                'user_id' => 'required',
                'stock_id' => 'required',
                'days' => 'required:integer',
                'delivery_date' => 'required',
            ]);

            $reservation->fill($request->all());

            $savedReservation = $this->reservationService->create($reservation);

            return [
                'reservation_id' => 99
            ];
        } catch(\Throwable $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
