<?php

namespace Application\Product\Show;

use App\Models\StoreProduct;

class Controller
{
    public function __invoke()
    {
        $product = StoreProduct::query()
            ->find(1);

        return response()
            ->json(compact('product'));
    }
}
