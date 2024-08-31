<?php

namespace Aplication\Customer\Domain;

use App\Models\CustomerCart;

class Cart
{
    public static function fromModel(CustomerCart $customerCart)
    {
        return new static();
    }
}
