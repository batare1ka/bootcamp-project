<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class HomeApiController extends Controller
{
    private $responseFactory;

    public function __construct(ResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function suggestedProducts()
    {
        $products = [];
        $dressesRompers = Product::select("id", "name", "price", 'img_large_url')
        ->with('stocks')
        ->whereHas('categories', function (Builder $query) {
            $query->where('name', 'dresses-rompers');
        })->limit(4)->get();
        $dressesRompers = $dressesRompers->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        $products["dresses_rompers"] = $dressesRompers;

        $hatsCaps = Product::select("id", "name", "price", 'img_large_url')
        ->with('stocks')
        ->whereHas('categories', function (Builder $query) {
            $query->where('name', 'hats-caps');
        })->limit(4)->get();
        $hatsCaps = $hatsCaps->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        $products["hats_caps"] = $hatsCaps;

        $coatsJackets = Product::select("id", "name", "price",'img_large_url')
        ->with('stocks')
        ->whereHas('categories', function (Builder $query) {
            $query->where('name', 'coats-jackets');
        })->limit(4)->get();
        $coatsJackets = $coatsJackets->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        $products["coats_jackets"] = $coatsJackets;

        $topProducts = Product::select("id", "name", "price", 'img_large_url')
        ->with('stocks')
        ->orderByDesc("view_count")
        ->limit(4)
        ->get();
        $topProducts = $topProducts->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        $products["top_products"] = $topProducts;

        $featuredProducts = Product::select("id", 'img_large_url')
        ->whereHas('categories', function (Builder $query) {
            $query->where('name', 'featured');
        })
        ->limit(3)
        ->get();
        $featuredProducts = $featuredProducts->map(function ($product) {
            return [
                'id' => $product->id,
                'image_url' => $product->img_large_url
            ];
        });
        $products["featured_products"] = $featuredProducts;
        

        return $this->responseFactory->json($products);
    }
}
