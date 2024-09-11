<?php

namespace Database\Seeders;

use App\Models\CustomerAddress;
use App\Models\Store;
use App\Models\StoreCategory;
use App\Models\StoreCustomer;
use App\Models\StoreProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Store::factory()->create();

        StoreCustomer::factory()->create([
            'store_id' => 1,
            'name' => 'Felipe Bona',
            'email' => 'felipechiodinibona@hotmail.com',
            'cellphone' => '47999999999',
            'password' => Hash::make('132567'),
        ]);

        CustomerAddress::factory()->create(['customer_id' => 1]);
        StoreCategory::factory()->create(['store_id' => 1]);
        StoreProduct::factory()->create(['store_id' => 1, 'category_id' => 1]);
    }
}
