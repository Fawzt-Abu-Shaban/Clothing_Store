<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Categorie;
use App\Models\Slider;
use App\Notifications\OrderNotification;
use Checkout\CheckoutApi;
use Illuminate\Http\Request;
use Checkout\Models\Tokens\Card;
use Illuminate\Support\Facades\Auth;
use Checkout\Models\Payments\Payment;
use Checkout\Models\Payments\TokenSource;


class SiteController extends Controller
{
    function index()
    {
        $slider = Slider::latest()->limit(5)->get();
        $sliders = Slider::paginate('2');
        $product = Product::latest()->limit(8)->get();
        return view('website.index', compact('product', 'sliders', 'slider'));
    }

    function category($slug)
    {
        $category = Categorie::where('slug', $slug)->first();
        return view('website.category')->with('category', $category);
    }

    function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('website.show', compact('product'));
    }

    public function buy(Request $request)
    {
        Cart::create($request->except('_token'));

        if ($request->type == 'cart') {
            $msg = 'Product Add To Cart Successfully';
        } else {
            $msg = 'Product Add To Wishlist Successfully';
        }
        $users = User::where('role', 'user')->get();
        foreach ($users as $user) {
            $user->notify(new OrderNotification);
        }

        return redirect()->back()->with('success', $msg);
    }

    public function cartremoved($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function checkout()
    {
        $total = 0;
        if (Auth::user()) {
            foreach (Auth::user()->cart()->where('type', 'cart')->whereNull('order_id')->get() as $cart) {
                $total += $cart->product->price;
            }
        } else {
            $total = 0;
        }
        return view('website.checkout', compact('total'));
    }

    public function payment(Request $request)
    {
        $total = 0;
        foreach (Auth::user()->cart()->where('type', 'cart')->whereNull('order_id')->get() as $cart) {
            $total += $cart->product->price;
        }

        // Set the secret key
        $secretKey = 'pk_test_8ac41c0d-fbcc-4ae3-a771-31ea533a2beb';

        // Initialize the Checkout API in Sandbox mode. Use new CheckoutApi($liveSecretKey, false); for production
        $checkout = new CheckoutApi($secretKey);


        // Create a payment method instance with card details
        $method = new TokenSource('tok_key_goes_here');

        // Prepare the payment parameters
        $payment = new Payment($method, 'USD');
        $payment->amount = $total * 100 + 1; // = 10.00

        // Send the request and retrieve the response
        $response = $checkout->payments()->request($payment);

        if ($response->status == 'Authorized') {

            $order_total = $total;

            $order = Order::create([
                'user_id' => Auth::id(),
                'totel' => $order_total,
                'invoice_number' => rand(000000, 999999),
            ]);

            Auth::user()->cart()->where('type', 'cart')->whereNull('order_id')->update([
                'order_id' => $order->id
            ]);

            // $users = User::where('role' , 'admin')->get();
            // foreach($users as $user){
            //     $user->notify(new OrderNotification);
            // }


            return route('success');
        } else {
            return route('fial');
        }
    }

    public function search()
    {

        $product = Product::all();

        if (request()->has('keyword')) {
            $keyword = request()->keyword;
            $product = Product::latest()->where('name', 'like', "%$keyword%")->orwhere('price', 'like', "%$keyword%")->paginate();
        }

        return view('website.search', compact('product'));
    }

    public function contact_us()
    {
        return view('website.contact-us');
    }

    public function about_us()
    {
        return view('website.about-us');
    }

    public function allproduct()
    {
        $product = Product::all();
        return view('website.allproduct', compact('product'));
    }

    public function cart()
    {
        $cart = Cart::all();
        // $product = Product::all();
        return view('website.cart', compact('cart'));
    }
    public function wishlist()
    {
        $cart = Cart::all();
        return view('website.wishlist', compact('cart'));
    }

    public function delete_all()
    {
        Cart::truncate();
        return redirect()->back();
    }
}
