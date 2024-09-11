<?php

namespace Admin\Products\Store;

use App\Models\StoreProduct;

class Persistence implements PersistenceContract
{
    public function addProductInStore(array $data): void
    {
        StoreProduct::query()->create($data);
    }
}
