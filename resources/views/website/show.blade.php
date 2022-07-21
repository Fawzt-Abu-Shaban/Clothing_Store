@extends('website.master')

@section('content')

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="w-100 h-100" src="{{ asset('images/'.$product->image) }}" alt="">
            </div>
            <div class="col-md-6">

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Done!</strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <h1>{{ $product->name }}</h1>
                <h4 class="my-4">price ${{ $product->price }}</h4>
                <p>{{ $product->discription}}</p>

                <div class="mt-4">
                    <form class="d-inline" method="POST" action="{{ route('website.buy') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="type" value="cart">

                        <button class="btn btn-primary">Add To Cart</button>
                    </form>
                    <form class="d-inline" method="POST" action="{{ route('website.buy') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="type" value="wishlist">

                        <button style="background: rgb(246, 64, 64)" class="btn btn-primary ti-heart">Add To Wishlist</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @php
        $album = explode(',' , $product->album);
    @endphp
    <div class="container mt-5">
        <div class="row">
                @foreach ($album as $a)
                <img class="w-25 p-2" src="{{ asset('images/'.$a) }}" alt="">
                @endforeach

        </div>
    </div>
</section>

@stop
