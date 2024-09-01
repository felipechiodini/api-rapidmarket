<?php

namespace Application\Home;

use App\Models\StoreProduct;
use Illuminate\Http\Request;

class Controller
{
    public function __invoke(Request $request)
    {
        $products = StoreProduct::query()
            ->get();

        $home = [
            'products' => $products
        ];

        return response()
            ->json(compact('home'));
    }
}
