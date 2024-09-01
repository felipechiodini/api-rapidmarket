<?php

namespace Application\Cart\Add;

use App\Models\CartItem;
use App\Models\StoreProduct;
use Application\Customer\UseCases\GetCart;

class Controller
{
    private GetCart $getCart;

    public function __construct(GetCart $getCart)
    {
        $this->$getCart = $getCart;
    }

    public function __invoke(Form $request)
    {
        $cart = $this->getCart->execute($request->user()->id);

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
