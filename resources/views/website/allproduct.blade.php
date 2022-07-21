@extends('website.master')

@section('content')

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2> All Products </h2>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Done!</strong> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
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

@stop
