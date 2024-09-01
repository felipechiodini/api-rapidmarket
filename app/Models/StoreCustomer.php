<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCustomer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'name',
        'email',
        'cellphone',
        'password'
    ];
}
