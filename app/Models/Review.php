<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }
    function product(){
        return $this->belongsTo(Product::class);
    }

}
