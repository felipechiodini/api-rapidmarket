<?php

namespace Admin\Products\Controllers;

use App\Models\StoreProduct;

class Index
{
    public function __invoke()
    {
        StoreProduct::query()
            ->get();

        return response()
            ->json(compact('page'));
    }
}
