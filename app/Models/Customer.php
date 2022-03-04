<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'city',
        'email',
        'phone_num',
        'address',
        'street',
        'zip_code'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
