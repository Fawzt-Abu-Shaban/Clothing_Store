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
                    @foreach (Auth::user()->cart()->where('type','wishlist')->whereNull('order_id')->get() as $cart)
                            <div class="wrap-iten-in-cart mt-5">

                                <ul class="products-cart">
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                        <figure><img src="assets/images/products/digital_18.jpg" alt=""></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="#">{{$cart->product->name}}</a>
                                    </div>
                                    <div class="price-field produtc-price">
                                        <p class="price">${{$cart->product->price}}</p>
                                    </div>
                                            <form action="{{ route('website.cartremoved', $cart->id) }}"
                                                method="post">
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
                                </ul>
                            </div>
                            @endforeach

                            <div class="checkout-info mt-5">

                                <a class="link-to-shop" href="{{route('website.index')}}">Continue Shopping<i class="fa fa-arrow-circle-right"
                                        aria-hidden="true"></i></a>
                            </div>
                            {{-- <div class="update-clear mt-5">
                                <a class="btn btn-clear" onclick="return @if($cart->count() > 0)
                                    confirm('Are You Sure??') @endif"
                                href="{{route('website.delete_all')}}">Clear Wishlist</a>
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



