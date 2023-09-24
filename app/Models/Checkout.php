<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'name',
        'no_hp',
        'address',
        'city',
        'province',
        'zipcode',
        'courier',
        'product_id',
        'price',
        'qty',
        'shipping_cost',
        'total', 
        'status' ,
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
