<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderProduct;
use App\Models\Brand;
use App\Models\Stock;
use App\Models\Article;
use App\Models\BlogTag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
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
        Brand::factory()->count(30)
        ->has(Product::factory()
        ->has(Category::factory())
        ->has(ProductsDetail::factory())
        ->has(Stock::factory()), 'products')
        ->create();
        
        Article::factory()
            ->count(10)
            ->has(BlogTag::factory(), 'tags')
            ->create();

        Comment::factory()->count(20)->create();
    }
}
