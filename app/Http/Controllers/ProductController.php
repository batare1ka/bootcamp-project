<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\ModelLogger;

class ProductController extends Controller
{
    public function index($id, Request $request, ModelLogger $logger){
        $products = Product::with('brand', 'categories', 'productsDetail')->get();
        $product = $products->find($id);
        $randomProducts = $products->random(4);
        $logger->logModel($request->user(), $product);
        return view('product.product',
         ['product' => $product,
        'randomProducts' => $randomProducts
        ]);
    }
}
