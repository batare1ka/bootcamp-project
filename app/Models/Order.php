<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'payment_id',
        'totat_price',
        'order_date'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function orderProduct(){
        return $this->hasOne(OrderProduct::class);
    }
}
