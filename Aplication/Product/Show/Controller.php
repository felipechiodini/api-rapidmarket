<?php

namespace App\Product\Show;

class Controller
{
    public function __invoke()
    {
        $product = [
            'id' => 1,
            'name' => 'Product 1',
            'price' => 50,
            'price_from' => 100
        ];

        return response()
            ->json(compact('product'));
    }
}
