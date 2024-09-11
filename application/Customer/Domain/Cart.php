<?php

namespace Application\Customer\Domain;

use App\Models\CustomerCart;
use Illuminate\Support\Collection;

class Cart
{
    public $id;
    public $products;
    public $total;

    public static function fromModel(CustomerCart $customerCart, Collection $products)
    {
        return new static(
            $customerCart->id,
            $products
        );
    }

    public function __construct(int $id, Collection $products)
    {
        $this->id = $id;
        $this->products = $products;
        $this->total = $products->sum('price');
    }
}
