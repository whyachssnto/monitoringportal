<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IwoOrder extends Model
{
    protected $fillable = [
        'order_number',
        'iwo_to',
        'job',
        'amount',
    ];
}
