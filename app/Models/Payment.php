<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'payment_type',
        'payment_date',
        'payment_amount'
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }
}
