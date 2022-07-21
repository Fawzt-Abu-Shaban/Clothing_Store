<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Categorie;
use App\Models\Discount;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function products()
    {
        return Product::all();
    }
    public function categories()
    {
        return Categorie::all();
    }
    public function carts()
    {
        return Cart::all();
    }
    public function discounts()
    {
        return Discount::all();
    }
    public function sliders()
    {
        return Slider::all();
    }
    public function login(Request $request , $id)
    {
        // $user = User::all();
        return Auth::login($id);
        return $request->all();
    }

    public function register(Request $request)
    {
        return User::all();
        return $request->all();
    }




}
