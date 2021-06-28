@extends('wayshop.layouts.master')
@section('content')

	<main>
		<div class="header-video">
			<div id="hero_video">
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6">
								<div class="slide-text white">
									<h3>Hello People!!<br>Welcome To our Ecommerce Shop</h3>
									<p>Limited items available at low price</p>
									<a class="btn_1" href="#0" role="button">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<img src="{{asset('front_asset/img/video_fix.png')}}" alt="" class="header-video--media" data-video-src="{{asset('front_asset/video/intro')}}" data-teaser-source="{{asset('front_asset/video/intro')}}" data-provider="" data-video-width="1920" data-video-height="960">
		</div>
		<!-- /header-video -->

		<div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->
		
		<ul id="banners_grid" class="clearfix">
		@foreach($banners as $key => $banner)
			<li>
				<a href="#0" class="img_container">
					<img src="uploads/banners/{{$banner->image}}" data-src="uploads/banners/{{$banner->image}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>{{$banner->name}}</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			@endforeach
			<!-- <li>
				<a href="#0" class="img_container">
					<img src="{{asset('front_asset/img/banners_cat_placeholder.jpg')}}" data-src="{{asset('front_asset/img/banner_2.jpg')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Womens's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li>
			<li>
				<a href="#0" class="img_container">
					<img src="{{asset('front_asset/img/banners_cat_placeholder.jpg')}}" data-src="{{asset('front_asset/img/banner_3.jpg')}}" alt="" class="lazy">
					<div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
						<h3>Kids's Collection</h3>
						<div><span class="btn_1">Shop Now</span></div>
					</div>
				</a>
			</li> -->
		</ul>
		<!--/banners_grid -->

		<hr class="mb-0">
		
		<!-- <div class="container margin_60_35">
			<div class="main_title">
				<h2>Top Selling</h2>
				<span>Products</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="row small-gutters">
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<figure>
							<span class="ribbon off">-30%</span>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/1.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/1_b.jpg')}}" alt="">
							</a>
							<div data-countdown="2019/05/15" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air x Fear</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$48.00</span>
							<span class="old_price">$60.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
					
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon off">-30%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/2.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/2_b.jpg')}}" alt="">
							</a>
							<div data-countdown="2019/05/10" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Okwahn II</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$90.00</span>
							<span class="old_price">$170.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon off">-50%</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/3.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/3_b.jpg')}}" alt="">
							</a>
							<div data-countdown="2019/05/21" class="countdown"></div>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Wildwood ACG</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$75.00</span>
							<span class="old_price">$155.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/4.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/4_b.jpg')}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor ACG React Terra</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$110.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/5.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/5_b.jpg')}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Zoom Alpha</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$140.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/6.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/6_b.jpg')}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Alpha</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$130.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/7.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/7_b.jpg')}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Max 98</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$115.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="product-detail-1.html">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/8.jpg')}}" alt="">
								<img class="img-fluid lazy" src="{{asset('front_asset/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/8_b.jpg')}}" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="product-detail-1.html">
							<h3>Armor Air Max 720</h3>
						</a>
						<div class="price_box">
							<span class="new_price">$120.00</span>
						</div>
						<ul>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
							<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div> -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest</h2>
				<span>Products</span>
				<p>Hurry Up!! This is our Latest Product For You.</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach($latestProducts as $LatestProduct)
					<div class="item">
						<div class="grid_item">
							<span class="ribbon hot">New</span>
							<figure>
								<a href="{{url('/products/'.$LatestProduct->id)}}">
									<img class="owl-lazy" src="uploads/products/{{$LatestProduct->image}}" data-src="uploads/products/{{$LatestProduct->image}}" alt="">
								</a>
							</figure>
							<!-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> -->
							<a href="{{url('/products/'.$LatestProduct->id)}}">
								<h3>{{$LatestProduct->name}}</h3>
							</a>
							<div class="price_box">
								<span class="new_price">Rs. {{$LatestProduct->price}}</span>
							</div>
							<ul>
								<li><a href="{{url('/products/'.$LatestProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="{{url('/products/'.$LatestProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="{{url('/products/'.$LatestProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
				@endforeach
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Featured</h2>
				<span>Products</span>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
			</div>
			<div class="owl-carousel owl-theme products_carousel">
				@foreach($featuredProducts as $key => $featuredProduct)
					<div class="item">
						<div class="grid_item">
							<!-- <span class="ribbon new">New</span> -->
							<figure>
								<a href="{{url('/products/'.$featuredProduct->id)}}">
									<img class="owl-lazy" src="{{asset('uploads/products/'.$featuredProduct->image)}}" data-src="{{asset('uploads/products/'.$featuredProduct->image)}}" alt="">
								</a>
							</figure>
							<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
							<a href="{{url('/products/'.$featuredProduct->id)}}">
								<h3>{{$featuredProduct->name}}</h3>
							</a>
							<div class="price_box">
								<span class="new_price">Rs. {{$featuredProduct->price}}</span>
							</div>
							<ul>
								<li><a href="{{url('/products/'.$featuredProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
								<li><a href="{{url('/products/'.$featuredProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
								<li><a href="{{url('/products/'.$featuredProduct->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
							</ul>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /item -->
				@endforeach
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
			@if(isset($product_banners))               
			<div class="featured lazy" data-bg="url({{ asset('uploads/banners/'.$product_banners->image) }})">
			@endif
				<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
					<div class="container margin_60">
						<div class="row justify-content-center justify-content-md-start">
							<div class="col-lg-6 wow" data-wow-offset="150">
								<h3>{{ isset($product_banners) ? $product_banners->name : '' }}<br>{{ isset($product_banners) ? $product_banners->text_style : '' }}</h3>
								<p>{{ isset($product_banners) ? $product_banners->content : '' }}</p>
								<div class="feat_text_block">
									<div class="price_box">
										<span class="new_price">Rs. {{ isset($product_banners) ? $product_banners->sort_order : '' }}</span>
										<span class="old_price">Rs. 00.00</span>
									</div>
									<a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- /featured -->
		
		<div class="container margin_60_35">
			<div class="main_title mb-4">
				<h2>New Arrival</h2>
				<span>Products</span>
				<p>Here is our Latest Category.</p>
			</div>
			<div class="isotope_filter">
				<ul>
					<li><a href="#0" id="all" data-filter="*">All</a></li>
					@foreach($new_arrival as $category)
						<li><a href="#0" id="{{ $category->slug }}" data-filter=".{{ $category->slug }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
			</div>
			<div class="isotope-wrapper">
				<div class="row small-gutters">
					@foreach($new_arrival as $category)
						@foreach ($category->products as $product)
							<div class="col-6 col-md-4 col-xl-3 isotope-item {{ $product->category->slug }}">
								<div class="grid_item">
									<figure>
										<span class="ribbon off">-30%</span>
										<a href="{{url('/products/'.$product->id)}}">
											<img class="img-fluid lazy" src="uploads/products/{{$product->image}}" data-src="uploads/products/{{$product->image}}" alt="">
											<img class="img-fluid lazy" src="uploads/products/{{$product->image}}" data-src="uploads/products/{{$product->image}}" alt="">
										</a>
										<div data-countdown="2019/05/15" class="countdown"></div>
									</figure>
									<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
									<a href="{{url('/products/'.$product->id)}}">
										<h3>{{$product->name}}</h3>
									</a>
									<div class="price_box">
										<span class="new_price">Rs. {{$product->price}}</span>
										<span class="old_price">$00.00</span>
									</div>
									<ul>
										<li><a href="{{url('/products/'.$product->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
										<li><a href="{{url('/products/'.$product->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
										<li><a href="{{url('/products/'.$product->id)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
									</ul>
								</div>
								<!-- /grid_item -->
							</div>
						@endforeach
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /isotope-wrapper -->
		</div>
		<!-- /container -->

		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_1.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_2.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_3.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_4.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_5.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="{{asset('front_asset/img/brands/placeholder_brands.png')}}" data-src="{{asset('front_asset/img/brands/logo_6.png')}}" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->
		
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Latest Blog</h2>
				<span>Blog</span>
				<p>Here is our latest blog by admin and supported people</p>
			</div>
			<div class="row">
				@foreach($blogs as $blog)
				<div class="col-lg-6">
					<a class="box_news" href="{{ url('blog-details/'.$blog->id) }}">
						<figure>
							<img src="{{ asset('/uploads/blog/'.$blog->image) }}" data-src="{{ asset('/uploads/blog/'.$blog->image) }}" alt="" width="400" height="266" class="lazy">
							<figcaption><strong></strong>Read More</figcaption>
						</figure>
						<ul>
							<li>by Admin</li>
							<li>{{$blog->created_at}}</li>
						</ul>
						<h4>{{$blog->blog_title}}</h4>
						<p>{{$blog->blog_intro}}</p>
					</a>
				</div>
				@endforeach

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
		
	</main>
	<!-- /main -->


@endsection