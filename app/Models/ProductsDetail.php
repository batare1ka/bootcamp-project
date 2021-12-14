<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'weight',
        'composition',
        'description',
        'features'
        
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
