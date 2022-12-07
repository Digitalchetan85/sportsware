<div>
    <main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>checkout</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<form wire:submit.prevent='placeOrder'>
					<div class="row">
						<div class="col-md-12">
							<div class="wrap-address-billing">
								<h3 class="box-title">Billing Address</h3>
								<div class="billing-adderess">
									<p class="row-in-form">
										<label for="fname">first name<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Your name" wire:model="fname">
										@error('fname') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Your last name" wire:model="lname">
										@error('lname') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess:</label>
										<input type="email" name="email" value="" placeholder="Type your email" wire:model="email">
										@error('email') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="10 digits format" wire:model="phone">
										@error('phone') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Line 1</label>
										<input type="text" name="add" value="" placeholder="Line 1" wire:model='line1'>
										@error('line1') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Line 2:</label>
										<input type="text" name="add" value="" placeholder="Line 2" wire:model="line2">
										@error('line2') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">State:</label>
										<input type="text" name="add" value="" placeholder="State" wire:model="state">
										@error('state') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input type="text" name="country" value="" placeholder="India" wire:model="country">
										@error('country') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postcode / ZIP:</label>
										<input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
										@error('zipcode') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Town / City<span>*</span></label>
										<input type="text" name="city" value="" placeholder="City name" wire:model="city">
										@error('city') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form fill-wife">
										{{-- <label class="checkbox-field">
											<input name="create-account" id="create-account" value="forever" type="checkbox">
											<span>Create an account?</span>
										</label> --}}
										<label class="checkbox-field">
											<input name="different-add" id="different-add" value="forever" type="checkbox" wire:model="ship_to_different">
											<span>Ship to a different address?</span>
										</label>
									</p>
								</div>
							</div>

							@if($ship_to_different)
							<div class="wrap-address-billing">
								<h3 class="box-title">Shipping Address</h3>
								<div class="billing-adderess">
									<p class="row-in-form">
										<label for="fname">first name<span>*</span></label>
										<input type="text" name="fname" value="" placeholder="Your name" wire:model="s_fname">
										@error('s_fname') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="lname">last name<span>*</span></label>
										<input type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lname">
										@error('s_lname') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="email">Email Addreess:</label>
										<input type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
										@error('s_email') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="phone">Phone number<span>*</span></label>
										<input type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_phone">
										@error('s_phone') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Line 1</label>
										<input type="text" name="add" value="" placeholder="Line 1" wire:model='s_line1'>
										@error('s_line1') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">Line 2:</label>
										<input type="text" name="add" value="" placeholder="Line 2" wire:model="s_line2">
										@error('s_line2') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="add">State:</label>
										<input type="text" name="add" value="" placeholder="State" wire:model="s_state">
										@error('s_state') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="country">Country<span>*</span></label>
										<input type="text" name="country" value="" placeholder="India" wire:model="s_country">
										@error('s_country') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="zip-code">Postcode / ZIP:</label>
										<input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
										@error('s_zipcode') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
									<p class="row-in-form">
										<label for="city">Town / City<span>*</span></label>
										<input type="text" name="city" value="" placeholder="City name" wire:model="s_city">
										@error('s_city') <span class="text-danger">{{ $message }}</span> @enderror
									</p>
								</div>
							</div>
							@endif
						</div>
					</div>

					<div class="summary summary-checkout">
						<div class="summary-item payment-method">
							<h4 class="title-box">Payment Method</h4>
							{{-- <p class="summary-info"><span class="title">Check / Money order</span></p>
							<p class="summary-info"><span class="title">Credit Cart (saved)</span></p> --}}
							<div class="choose-payment-methods">
								<label class="payment-method">
									<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentMethod">
									<span>Cash on Delivery</span>
									{{-- <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span> --}}
								</label>
								<label class="payment-method">
									<input name="payment-method" id="payment-method-visa" value="razorpay" type="radio" wire:model="paymentMethod">
									<span>Razorpay</span>
									{{-- <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span> --}}
								</label>
							</div>
							@if(Session::has('checkout'))
								<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">₹{{ Session::get('checkout')['total'] }}</span></p>
							@else
								<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">0</span></p>
							@endif
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
						{{-- <div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<p class="summary-info"><span class="title">Flat Rate</span></p>
							<p class="summary-info"><span class="title">Fixed $50.00</span></p>
							<h4 class="title-box">Discount Codes</h4>
							<p class="row-in-form">
								<label for="coupon-code">Enter Your Coupon code:</label>
								<input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">	
							</p>
							<a href="#" class="btn btn-small">Apply</a>
						</div> --}}
					</div>
				</form>
				{{-- <div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_04.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_01.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_03.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item sale-label">sale</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_04.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item new-label">new</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>

							<div class="product product-style-2 equal-elem ">
								<div class="product-thumnail">
									<a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
										<figure><img src="{{ ('assets/images/products/digital_05.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
									</a>
									<div class="group-flash">
										<span class="flash-item bestseller-label">Bestseller</span>
									</div>
									<div class="wrap-btn">
										<a href="#" class="function-link">quick view</a>
									</div>
								</div>
								<div class="product-info">
									<a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
									<div class="wrap-price"><span class="product-price">$250.00</span></div>
								</div>
							</div>
						</div>
					</div><!--End wrap-products-->
				</div> --}}

			</div><!--end main content area-->
		</div><!--end container-->

	</main>
</div>
