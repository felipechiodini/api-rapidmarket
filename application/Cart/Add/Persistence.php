<?php

namespace Application\Cart\Add;

use Application\Customer\Domain\Cart;
use App\Models\CartItem;

class Persistence implements PersistenceContract
{
    public function addProductInCart(Cart $cart): void
    {
        CartItem::query()
            ->create([
                'cart_id' => $cart->id,
                'product_id' => null,
                'quantity' => null
            ]);
    }
}
