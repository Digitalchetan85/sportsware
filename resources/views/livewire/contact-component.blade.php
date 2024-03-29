<div>
    <main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>Contact us</span></li>
				</ul>
			</div>
			<div class="row">
				<div class=" main-content-area">
					<div class="wrap-contacts ">
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-form">
								<h2 class="box-title">Leave a Message</h2>
                                @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                                @endif
								<form name="frm-contact" wire:submit.prevent="sendMessage">

									<label for="name">Name<span>*</span></label>
									<input type="text" value="" id="name" name="name" wire:model="name" >
                                    @error('name') <p class="text-danger">{{ $message }}</p>@enderror

									<label for="email">Email<span>*</span></label>
									<input type="text" value="" id="email" name="email" wire:model="email" >
                                    @error('email') <p class="text-danger">{{ $message }}</p>@enderror


									<label for="phone"> Phone Number</label>
									<input type="text" value="" id="phone" name="phone" wire:model="phone" >
                                    @error('phone') <p class="text-danger">{{ $message }}</p>@enderror


									<label for="comment">Comment</label>
									<textarea name="comment" id="comment" wire:model="comment"></textarea>
                                    @error('comment') <p class="text-danger">{{ $message }}</p>@enderror


									<input type="submit" name="ok" value="Submit" >
									
								</form>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
							<div class="contact-box contact-info">
								<div class="wrap-map">
									<div class="mercado-google-maps"
										 id="az-google-maps57341d9e51968"
										 data-hue=""
										 data-lightness="1"
										 data-map-style="2"
										 data-saturation="-100"
										 data-modify-coloring="false"
										 data-title_maps="Kute themes"
										 data-phone="088-465 9965 02"
										 data-email="kutethemes@gmail.com"
										 data-address="Z115 TP. Thai Nguyen"
										 data-longitude="-0.120850"
										 data-latitude="51.508742"
										 data-pin-icon=""
										 data-zoom="16"
										 data-map-type="ROADMAP"
										 data-map-height="263">
									</div>
								</div>
								<h2 class="box-title">Contact Detail</h2>
								<div class="wrap-icon-box">

									<div class="icon-box-item">
										<i class="fa fa-envelope" aria-hidden="true"></i>
										<div class="right-info">
											<b>Email</b>
<<<<<<< HEAD
											<p>info@shanthasdesigns.com</p>
=======
											<p>info@shanthasportssware.com</p>
>>>>>>> cb2b4baba263cfb1e0795e6ef5fdb84fc99cb89d
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-phone" aria-hidden="true"></i>
										<div class="right-info">
											<b>Phone</b>
											<p>+91 9980898483</p>
										</div>
									</div>

									<div class="icon-box-item">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<div class="right-info">
											<b>Office Address</b>
											<p>483, 1st Floor, 8th Cross, 10th Main, HAL 3rd Stage, Jeevan Bima Nagar, Bengaluru, Karnataka 560075</p>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div><!--end main products area-->

			</div><!--end row-->

		</div><!--end container-->

	</main>
</div>