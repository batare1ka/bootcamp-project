<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function productstock(){
        return $this->hasMany(Stock::class);
    }


    public function brand(){
        return $this->belongsTo(Brands::class);
    }

    public function details(){
        return $this->hasOne(ProductsDetail::class)
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class);
    }
}
