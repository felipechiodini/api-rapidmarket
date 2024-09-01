<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'image',
        'description',
        'price',
        'price_from',
    ];
}
