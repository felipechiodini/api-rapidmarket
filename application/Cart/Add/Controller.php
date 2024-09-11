<?php

namespace Application\Cart\Add;

use App\Models\CartItem;
use App\Models\StoreProduct;
use Application\Customer\UseCases\GetCart;

class Controller
{
    public function __invoke(Form $request, GetCart $getCart)
    {
        $cart = $getCart->execute($request->user()->id);

        $model = StoreProduct::find($request->product_id);

        $has = CartItem::query()
            ->where('cart_id', $cart->id)
            ->where('product_id', $model->id)
            ->exists();

        if ($has) {
            CartItem::query()
                ->where('cart_id', $cart->id)
                ->where('product_id', $model->id)
                ->increment('quantity', $request->quantity);
        } else {
            CartItem::query()
                ->create([
                    'cart_id' => $cart->id,
                    'product_id' => $model->id,
                    'quantity' => $request->quantity,
                ]);
        }

        $message = 'Product added to cart';

        $cart = $getCart->execute($request->user()->id);

        return response()
            ->json(compact('message', 'cart'));
    }
}
