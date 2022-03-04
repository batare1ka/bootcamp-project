<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements LoggableInterface
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'price',
        'img_large_url',
        'img_small_url',
        "view_count"
        
    ];


    public function stocks(){
        return $this->hasMany(Stock::class);
    }


    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function productsDetail(){
        return $this->hasOne(ProductsDetail::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }
    public function getStringRepresentation(): string
    {
        return "Product with id {$this->id}";
    }
    public function getData(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'brand_id' => $this->brand_id
        ];
    }
}
