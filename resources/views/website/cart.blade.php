@extends('website.master')

@section('content')

    <!--main area-->
    <main id="main" class="main-site">

        <div class="container">

            <div class=" main-content-area mt-5">
                <h3 class="box-title">Products Name</h3>

                @auth
                    @php
                        $total = 0;
                    @endphp
                    @foreach (Auth::user()->cart()->where('type', 'cart')->whereNull('order_id')->get() as $cart)
                        <div class="wrap-iten-in-cart mt-5">
                            <ul class="products-cart">
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="#">{{ $cart->product->name }}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">${{ $cart->product->price }}</p>
                                    </div>

                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text" name="product-quatity" value="1" data-max="120"
                                                pattern="[0-9]*">
                                            <button class="btn btn-increase" href="#"></button>

                                            <a class="btn btn-reduce" href="#"></a>
                                        </div>
                                    </div>
                                    <div class="price-field sub-total">
                                        <a class="price">${{ $cart->product->price }}</a>
                                    </div>
                                    <form action="{{ route('website.cartremoved', $cart->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="remove" title="Remove this item">
                                            <a href="#" class="btn btn-delete" title="">
                                                <span>Delete from your cart</span>
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                            </a>
                                        </button>
                                    </form>
                                </li>
                                @php
                                    $total += $cart->product->price;
                                @endphp
                            </ul>
                        </div>
                    @endforeach
                    <div class="summary">
                        <div class="order-summary mt-5">
                            <h4 class="title-box">Order Summary</h4>
                            <p class="summary-info"><span class="title">Subtotal</span><b
                                    class="index">${{ $total }}</b></p>
                            <p class="summary-info"><span class="title">Shipping</span><b class="index">+1</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b
                                    class="index">${{ $total + 1 }}</b>
                            </p>
                        </div>
                        <div class="checkout-info">
                            <label class="checkbox-field">
                                <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I
                                    have promo code</span>
                            </label>
                            <a class="btn btn-checkout" href="{{ route('website.checkout') }}">Check out</a>
                            <a class="link-to-shop" href="{{ route('website.index') }}">Continue Shopping<i
                                    class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                        </div>
                        {{-- <div class="update-clear">
                            <a class="btn btn-clear"
                                onclick="return @if ($cart->count() > 0) confirm('Are You Sure??') @endif"
                                href="{{ route('website.delete_all') }}">Clear Shopping Cart</a>
                        </div> --}}
                    </div>


                @endauth

            </div>
            <!--end main content area-->
        </div>
        <!--end container-->

    </main>
    <!--main area-->
@stop
