<?php

namespace Application\Cart\Decrease;

use App\Models\CartItem;
use Application\Customer\UseCases\GetCart;

class Controller
{
    private $getCart;

    public function __construct(GetCart $getCart)
    {
        $this->getCart = $getCart;
    }

    public function __invoke(Form $request)
    {
        $cart = $this->getCart->execute($request->user()->id);

        $item = CartItem::query()
            ->where('cart_id', $cart->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($item->quantity === 1) {
            $item->delete();
        } else {
            $item->update(['quantity', $request->quantity]);
        }

        $message = 'Product removed from cart';

        return response()
            ->json(compact('message'));
    }
}
