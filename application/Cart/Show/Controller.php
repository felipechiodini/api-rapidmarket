<?php

namespace Application\Cart\Show;

use Application\Customer\UseCases\GetCart;

class Controller
{
    public $getCart;

    public function __construct(GetCart $getCart)
    {
        $this->getCart = $getCart;
    }

    public function __invoke(Form $request)
    {
        $cart = $this->getCart->execute($request->user()->id);

        return response()
            ->json(compact('cart'));
    }
}
