<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Services\ModelLogger;

class ShopController extends Controller
{
    public function index(Request $req){

        return view('shop.shop');
    }
    public function showProduct($id, Request $request, ModelLogger $logger){

        $products = Product::with('brand', 'categories', 'productsDetail')->get();
        $product = $products->find($id);
        $product->view_count++;
        $product->save();
        $randomProducts = $products->random(4);

        $logger->logModel($request->user(), $product);
        
        return view('product.product',
         ['product' => $product,
        'randomProducts' => $randomProducts
        ]);
    }
}
