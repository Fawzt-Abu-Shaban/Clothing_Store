<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }

    function cart(){
        return $this->hasMany(Cart::class);
    }

}
