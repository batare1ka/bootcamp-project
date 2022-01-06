<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;

class ShopController extends Controller
{
    public function index(Request $req){
        $request = request()->all();
        if(isset($request['brand']) && $request['brand'] != '0'){
            $products = Product::where('brand_id', $request['brand'])->paginate(12)->withQueryString();
        }else{
            if(isset($request['search'])){
                $products = Product::whereRelation(
                    'brand', 'name', 'like', '%'.$request['search'].'%'
                )->orWhere('name', 'LIKE', '%'.$request['search'].'%')
                ->paginate(12);
            }else{
                $products = Product::paginate(12);
            }
            
        }
        $brands = Brand::take(10)->get();
        if($req->ajax()){
            $view = view('components.prod-item', ['products' => $products])->render();
           return response()->json(['html'=> $view]);
        }

        
        return view('shop.shop',
         ['products' => $products,
            'brands' => $brands,
            'filter' => ['brand' => request('brand') ?? '']
        ]);
    }
}
