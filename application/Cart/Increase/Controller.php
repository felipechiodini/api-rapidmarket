<?php

namespace Application\Cart\Increase;

use App\Models\CartItem;
use Application\Customer\UseCases\GetCart;

class Controller
{
    public function __invoke(Form $request, GetCart $getCart)
    {
        $cart = $getCart->execute($request->user()->id);

        $item = CartItem::query()
            ->where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->increment('quantity');

        $message = 'Product increased in cart';

        return response()
            ->json(compact('message'));
    }
}
