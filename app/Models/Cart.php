<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }
    function product(){
        return $this->belongsTo(Product::class);
    }
    function order(){
        return $this->belongsTo(Order::class);
    }
    function slider(){
        return $this->belongsTo(Slider::class);
    }
}
