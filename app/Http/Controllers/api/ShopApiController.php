<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ShopApiController extends Controller
{
    public function readProducts(Request $request)
    {
       global $products;

        if($request->has('brand') && $request->has('category')){
            $products = Product::with('stocks')->whereHas('categories', function (Builder $query) use ($request) {
                $query->where('id', $request["category"]);
            })
            ->where("brand_id", $request["brand"])
            ->orderBy("created_at", $request["sort"] ?? "DESC")
            ->paginate(12);
        } else if($request->has('brand')){
            $products = Product::with('stocks')->where("brand_id", $request["brand"])
            ->orderBy("created_at", $request["sort"] ?? "DESC")
            ->paginate(12);
        } else if($request->has('category')){
            $products = Product::with('stocks')->whereHas('categories', function (Builder $query) use ($request) {
                $query->where('id', $request["category"]);
            })
            ->orderBy("created_at", $request["sort"] ?? "DESC")
            ->paginate(12);
        }else{
            $products = Product::with('stocks')->orderBy("created_at", $request["sort"] ?? "DESC")
            ->paginate(12);
        }
        if($request->has("price")){
            if($request["price"] == "DESC"){
                $products = $products->sortByDesc("price")->values();
            }else{
                $products = $products->sortBy("price")->values();
            }
        }
        
        $productsNecesaryFields = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        return $productsNecesaryFields->toJson();

    }
    public function searchProducts(Request $request)
    {
        $products = Product::whereRelation(
            'brand', 'name', 'like', '%'.$request['search'].'%'
        )->orWhere('name', 'LIKE', '%'.$request['search'].'%')
        ->with('stocks')
        ->paginate(12);
        $productsNecesaryFields = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'price' => floatval($product->price),
                'image_url' => $product->img_large_url,
                "size" => $product->stocks[0]->size
            ];
        });
        return $productsNecesaryFields;
    }
    public function searchSuggestions(Request $request)
    {
        if($request['suggest']){
            $products = Product::whereRelation(
                'brand', 'name', 'like', '%'.$request['suggest'].'%'
            )->orWhere('name', 'LIKE', '%'.$request['suggest'].'%')
            ->limit(3)->get();
            $productsNecesaryFields = $products->map(function ($product) {
                return [
                    'name' => $product->name
                ];
            });
            return $productsNecesaryFields;
        }else{
            return [];
        }

        
    }
}
