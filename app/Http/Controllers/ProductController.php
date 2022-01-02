<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($id){
        $products = Product::with('brand', 'categories', 'productsDetail')->get();
        $product = $products->find($id);
        $randomProducts = $products->random(4);
        return view('product.product',
         ['product' => $product,
        'randomProducts' => $randomProducts
        ]);
    }
}
