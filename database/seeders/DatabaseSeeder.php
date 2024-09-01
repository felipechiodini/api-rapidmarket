<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\StoreCustomer;
use App\Models\StoreProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Store::factory()->create();
        StoreCustomer::factory()->create(['store_id' => 1]);
        StoreCategory::factory()->create(['store_id' => 1]);
        StoreProduct::factory()->create(['store_id' => 1, 'category_id' => 1]);
    }
}
