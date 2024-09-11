<?php

namespace Application\Home;

use App\Models\Store;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class Controller
{
    public function __invoke(Request $request)
    {
        $store = Store::query()
            ->first();

        $products = StoreProduct::query()
            ->get();

        $home = [
            'name' => $store->name,
            'logo' => $store->logo,
            'products' => $products
        ];

        return response()
            ->json(compact('home'));
    }
}
