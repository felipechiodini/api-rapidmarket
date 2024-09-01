<?php

namespace Application\Customer\UseCases;

use App\Models\CartItem;
use Application\Customer\Domain\Cart;
use App\Models\CustomerCart;

class GetCart
{
    public function execute(int $customerId): Cart
    {
        $model = CustomerCart::query()
            ->where('customer_id', $customerId)
            ->where('open', true)
            ->first();

        if ($model === null) {
            $model = CustomerCart::query()
                ->create([
                    'customer_id' => $customerId,
                    'open' => true
                ]);

            return Cart::fromModel($model, collect());
        }

        $products = CartItem::query()
            ->select('store_products.id', 'store_products.name', 'store_products.price', 'cart_items.quantity')
            ->leftJoin('store_products', 'store_products.id', '=', 'cart_items.product_id')
            ->where('cart_id', $model->id)
            ->get();

        return Cart::fromModel($model, $products);
    }
}
