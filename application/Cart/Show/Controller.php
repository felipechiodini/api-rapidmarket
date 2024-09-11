<?php

namespace Application\Cart\Show;

use Application\Customer\UseCases\GetCart;

class Controller
{
    public function __invoke(Form $request, GetCart $getCart)
    {
        $cart = $getCart->execute($request->user()->id);

        return response()
            ->json(compact('cart'));
    }
}
