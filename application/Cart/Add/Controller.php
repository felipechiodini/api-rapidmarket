<?php

namespace Application\Cart\Add;

use App\Models\CartItem;
use App\Models\StoreProduct;
use Application\Customer\UseCases\GetCart;

class Controller
{
    public function __invoke(Form $request, GetCart $getCart)
    {
        $cart = $getCart->execute(1);

        $model = StoreProduct::find($request->product_id);

        CartItem::query()
            ->create([
                'cart_id' => $cart->id,
                'product_id' => $model->id,
                'price' => $model->price,
                'quantity' => $request->quantity,
            ]);

        $message = 'Product added to cart';

        return response()
            ->json(compact('message'));
    }
}
