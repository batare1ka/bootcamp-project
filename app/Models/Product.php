<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'brand_id',
        'name',
        'price',
        'img_large_url',
        'img_small_url'
        
    ];


    public function stocks(){
        return $this->hasMany(Stock::class);
    }


    public function brand(){
        return $this->belongsTo(Brands::class);
    }

    public function ProductsDetail(){
        return $this->hasOne(ProductsDetail::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
}
