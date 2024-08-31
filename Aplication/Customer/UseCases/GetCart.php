<?php

namespace Aplication\Customer\UseCases;

use Aplication\Customer\Domain\Cart;
use App\Models\CustomerCart;

class GetCart
{
    public function handle(int $userId): Cart
    {
        $model = CustomerCart::query()
            ->where('customer_id', $userId)
            ->where('open', true)
            ->first();

        return Cart::fromModel($model);
    }
}
