<div class="col-xl-3 col-lg-4 col-md-4 col-12">
    <div class="single-product">
        <div class="product-img">
            <a href="{{route('website.product'  , $pro->slug)}}">
                <img class="default-img" src="{{ asset('images/'.$pro->image) }}" alt="#">

                @if ($pro->discount_id)
                    <span style="background:#ff3c45  " class="price-dec">{{ $pro->discount->percentage }}% Off </span>
                @endif

            </a>
            <div class="button-head">

                <form class="d-inline" method="POST" action="{{ route('website.buy') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="product_id" value="{{ $pro->id }}">
                    <input type="hidden" name="type" value="wishlist">

                        <div class="product-action">
                            <button class="btn btn-warning p-2" title="Wishlist"><i class=" ti-heart "></i></button>
                        </div>
                </form>

                <form class="d-inline" method="POST" action="{{ route('website.buy') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="product_id" value="{{ $pro->id }}">
                    <input type="hidden" name="type" value="cart">

                    <button  class="btn btn-warning p-2" title="Cart"><i class="fa fa-cart-plus"></i></button>

                </form>

            </div>
        </div>
        <div class="product-content">
            <h3><a href="{{route('website.product' , $pro->slug)}}">{{$pro->name}}</a></h3>
            <div class="product-price">
                <span class="old">${{ $pro->old_price }}</span>
                <span>${{ $pro->price }}</span>
            </div>
        </div>
    </div>
</div>
