<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderProduct;
use App\Models\Stock;
use App\Models\ProductsDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        OrderProduct::factory()->count(3)->create();
        Stock::factory()->count(3)->create();
        ProductsDetail::factory()->count(3)->create();
    }
}
