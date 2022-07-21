@extends('website.master')

@section('content')

    <!-- Slider Area -->
    <section class="hero-slider">

        <!--MAIN SLIDE-->
        <main id="main">
            <div class="container">
                <div class="wrap-main-slide">
                    <div style="justify-content: center; height: 400px;" class="slide-carousel owl-carousel style-nav-1"
                        data-items="1" data-loop="1" data-nav="true" data-dots="false">

                        @foreach ($slider as $slid)
                            <div class="item-slide">
                                <img style="height: 400px;" src="{{ asset('slider/' . $slid->image) }}" alt=""
                                    class="img-slide">
                                <div class="slide-info slide-3">
                                    <h2 style="color: #ff7300d8 " class="f-title">Great <b>{{ $slid->name }}</b></h2>
                                    @if ($slid->discount_id)
                                        <p style="color: #ff7300d8 ;font-size: 25px;" class="discount-code">
                                            {{ $slid->discount->percentage }}% Off</p>
                                    @endif
                                    <span style="color: #ff7300d8 ;font-size: 25px;"
                                        class="f-subtitle">{{ $slid->discription }}.</span>
                                    <p style="color: #ff7300d8 ;font-size: 25px;" class="sale-info">Stating at: <b
                                            class="price">${{ $slid->price }}</b></p>
                                    <a href="#" class="btn-link">Shop Now</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </main>
        {{-- <!--BANNER-->
			<div class="wrap-banner style-twin-default">
                @foreach ($sliders as $slid)

                        <div class="banner-item">
                            <a href="#" class="link-banner banner-effect-1">
                                <figure><img style="height: 250px" src="{{ asset('slider/'.$slid->image) }}" alt="" width="580" ></figure>
                            </a>
                        </div>

                @endforeach


			</div> --}}

        <!--/ End Single Slider -->
    </section>


    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Item</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <!-- Start Single Tab -->
                        <div class="row">
                            @forelse ($product as $pro)
                                @include('website.product')
                            @empty
                                <div class="col-12 align-items-center mt-5 free-version-banner">
                                    <div class="section-title mb-2">
                                        <h2 class="mt-2">No Data Here</h2>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                        <!--/ End Single Tab -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Most Popular -->


@stop
