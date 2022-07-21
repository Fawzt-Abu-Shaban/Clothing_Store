<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user(){
        return $this->belongsTo(User::class);
    }
    function categorie(){
        return $this->belongsTo(Categorie::class);
    }
    function discount(){
        return $this->belongsTo(Discount::class);
    }

    function cart(){
        return $this->hasMany(Cart::class);
    }
    function review(){
        return $this->hasMany(Review::class);
    }

}
