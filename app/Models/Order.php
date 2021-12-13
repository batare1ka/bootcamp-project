<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function customers(){
        return $this->belongsTo(Customer::class);
    }

    public function payments(){
        return $this->belongsTo(Payment::class);
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class);
    }
}
