<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public $fillable = [
        'external_payment_id',
        'user_id',
        'stock_id',
        'days',
        'delivery_date'
    ];
}
