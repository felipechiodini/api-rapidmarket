<?php

namespace Application\Home;

use App\Models\StoreProduct;
use Illuminate\Http\Request;

class Controller
{
    public function __invoke(Request $request)
    {
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

        $home = [
            'products' => $products
        ];

        return response()
            ->json(compact('home'));
    }
}
