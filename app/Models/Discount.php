<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $guarded = [];

    function product(){
        return $this->hasMany(Product::class);
    }

    public function slider()
    {
        return $this->hasMany(Slider::class);
    }

}
