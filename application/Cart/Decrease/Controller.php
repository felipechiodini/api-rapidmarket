<?php

namespace Application\Cart\Decrease;

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
            ->first();

        if ($item->quantity === 1) {
            $item->delete();
            $message = 'Product removed from cart';
        } else {
            $item->update(['quantity', $request->quantity]);
            $message = 'Product decreased from cart';
        }


        return response()
            ->json(compact('message'));
    }
}
