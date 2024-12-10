<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_number',
        'portofolio',
        'job',
        'amount',
        'status',
        'invoice_date',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }


}
