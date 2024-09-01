<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillble = [
        'customer_id',
        'status',
        'total',
        'subtotal',
        'discount',
        'delivery_fee',
        'requested_at',
    ];
}
