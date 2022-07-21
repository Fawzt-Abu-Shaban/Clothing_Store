@extends('website.master')

@section('content')

		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">

					<div class="col-lg-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
									<ul>
										<li>Sub Total<span>${{$total}}</span></li>
										<li>(+) Shipping<span>$1.00</span></li>
										<li class="last">Total<span>${{$total + 1}}</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
                                    <div class="checkout-form">
                                        <h2>Make Your Checkout Here</h2>

                                        <form class="mt-4" id="payment-form" method="post"
                                            action="https://merchant.com/charge-card">
                                            @csrf
                                            <div style="width: 500px" class="one-liner">
                                              <div class="card-frame"></div>
                                              <button id="pay-button" disabled>
                                                PAY USD {{$total + 1}}
                                              </button>
                                            </div>
                                            <p class="error-message"></p>
                                            <p class="success-payment-message"></p>
                                        </form>

                                    </div>

								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="{{ asset('userstyle/images/payment-method.png') }}" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->

						</div>
					</div>

			</div>
		</section>
		<!--/ End Checkout -->

@stop
