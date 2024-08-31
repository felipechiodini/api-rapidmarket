<?php

namespace Aplication\Home;

use App\Models\Store;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class Controller
{
    public function __invoke(string $slug, Request $request)
    {
        $store = Store::query()
            ->where('slug', $slug)
            ->first();

        $products = StoreProduct::query()
            ->get()
            ->map(function (StoreProduct $product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'price_from' => $product->price_from
                ];
            });


        return response()
            ->json($products);
    }
}
