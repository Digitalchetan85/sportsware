<div>
    <main id="main" class="main-site left-sidebar">
		<style>
			nav {
				text-align: center !important;
			}

			nav svg {
				height: 10px !important;
			}

			nav .hidden {
				display: block !important;
			}
		</style>
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Corporate Gifting</span></li>
				</ul>
			</div>

            <style>
                .product-wish {
                    position: absolute;
                    top:10%;
                    left:0;
                    z-index:99;
                    right:30px;
                    text-align:right;
                    padding-top:0;
                }
                .product-wish .fa {
                    color: #cbcbcb;
                    font-size: 32px;
                }
                .product-wish .fa:hover{
                    color: #ff7007;
                }
                .fill-heart {
                    color: #ff7007 !important;
                }
            </style>
            <div class="row">
                @if (Cart::instance('wishlist')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">
                    @php
                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                    @endphp
                    @foreach (Cart::instance('wishlist')->content() as $product)
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details', ['slug'=>$product->model->slug]) }}" title="{{ $product->model->name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $product->model->image }}" alt="{{ $product->model->name }}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{ $product->model->name }}</span></a>
                                <div class="wrap-price"><span class="product-price">{{ $product->model->regular_price }}</span></div>
                                <a href="#" class="btn add-to-cart" wire:click.prevent="moveProductToWishlist('{{ $product->rowId }}')">Move To Cart</a>
                                
                                <div class="product-wish">
                                    <a href="#" wire:click.prevent="removeFromWishlist({{ $product->model->id }})"><i class="fa fa-heart fill-heart"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                    <h2 class="text-center">No Item in wishlist</h2>
                @endif
                <div class="" style="padding-top:30px !important;">
                    
                </div>
            </div>

        </div>
    </main>
</div>