<?php

namespace Aplication\Cart\Show;

class Controller
{
    public function __invoke(Form $request)
    {
        $cart = [
            'value' => 100,
            'quantity' => 5,
            'products' => [
                'name' => 'Product 1',
                'price' => 50,
                'price_from' => 100,
                'quantity' => 5
            ]
        ];

        return response()
            ->json(compact('cart'));
    }
}
