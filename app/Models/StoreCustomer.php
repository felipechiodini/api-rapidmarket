<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class StoreCustomer extends Model
{
    use HasFactory, HasApiTokens;

    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'name',
        'email',
        'cellphone',
        'password'
    ];
}
