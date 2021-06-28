<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="{{url('/')}}">
								@if(isset($home_settings))
								<img src="{{ asset('uploads/homesettings/'.$home_settings->image) }}" alt="" width="100" height="35">
                                @else
								<img src="{{asset('front_asset/img/logo.png')}}" alt="" width="100" height="35">
                                @endif
							
							</a>
						</div>
					</div>
					<nav class="col-xl-6 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="{{url('/')}}"><img src="{{asset('front_asset/img/logo_black.svg')}}" alt="" width="100" height="35"></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								<li>
									<a href="{{url('/')}}" class="show-submenu">Home</a>
									<!-- <ul>
										<li><a href="{{url('/')}}">Slider</a></li>
										<li><a href="index-2.html">Video Background</a></li>
										<li><a href="index-3.html">Vertical Slider</a></li>
										<li><a href="index-4.html">GDPR Cookie Bar</a></li>
									</ul> -->
								</li>
								<li>
									<a href="{{url('/shop')}}" class="show-submenu-mega">Shop</a>
									<!-- /menu-wrapper -->
								</li>
								<li>
									<a href="{{url('/about-us')}}" class="show-submenu">About Us</a>
								</li>
								<li>
									<a href="{{url('/blog')}}">Blog</a>
								</li>
								<li>
									<a href="{{url('/contact')}}">Contact</a>
								</li>
							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+977 {{ isset($home_settings) ? $home_settings->phone_no : '' }}</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="{{url('/all-Categories')}}">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											All Categories
										</a>
									</span>
									<div id="menu">
										<ul>
										@foreach($categories as $cat)
											<li><span><a href="#0">{{$cat->name}}</a></span>
												<ul>
													@foreach($cat->categories as $key=>$subcat)
													<li><a href="{{url('/categories/'.$subcat->id)}}">{{$subcat->name}}</a></li>
													@endforeach
												</ul>
											</li>
										@endforeach
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input" >
							<form action="{{url('/shop')}}" method="GET">
									<input type="text" id='employee_search' placeholder="Search Products"  name="search" class="form-control" value="{{isset($product_search) ? $product_search : ''}}"/>
								<button type="submit"><i class="header-icon_search_custom"></i></button>
							</form>
							
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="cart.html" class="cart_bt"><strong>2</strong></a>
									<div class="dropdown-menu">
										@if((Auth::check()))
											<ul>
													<?php $total_amount = 0; ?>
													@foreach($userCart as $cart)
														<li>
															<a href="product-detail-1.html">
																<figure><img src="{{asset('/uploads/products/'.$cart->image)}}" data-src="{{asset('/uploads/products/'.$cart->image)}}" alt="" width="50" height="50" class="lazy"></figure>
																<strong><span>{{$cart->product_name}}</span>{{$cart->quantity}} * {{$cart->price}}</strong>
															</a>
															<a href="{{url('/cart')}}" class="action"><i class="ti-trash"></i></a>
														</li>
													<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
													@endforeach
														<!-- <li>
															<a href="product-detail-1.html">
																<figure><img src="{{asset('front_asset/img/products/product_placeholder_square_small.jpg')}}" data-src="{{asset('front_asset/img/products/shoes/thumb/2.jpg')}}" alt="" width="50" height="50" class="lazy"></figure>
																<strong><span>1x Armor Okwahn II</span>$110.00</strong>
															</a>
															<a href="0" class="action"><i class="ti-trash"></i></a>
														</li> -->
											</ul>
											<div class="total_drop">
												<div class="clearfix"><strong>Subtotal</strong><span>Rs <?php echo $total_amount; ?></span></div>
												<a href="{{url('/cart')}}" class="btn_1 outline">View Cart</a>
												<a href="{{url('/checkout')}}" class="btn_1">Checkout</a>
											</div>
											@else
											<a href="{{url('/login-register')}}" class="btn_1">Sign In</a>
											@endif
									</div>

								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								<a href="#0" class="wishlist"><span>Wishlist</span></a>
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="account.html" class="access_link"><span>Account</span></a>
									<div class="dropdown-menu">
										@if(empty(Auth::check()))
										<a href="{{url('/login-register')}}" class="btn_1">Sign In</a>
										@else
										<a href="{{url('/user-logout')}}" class="btn_1">LogOut</a>

										<ul>
											<!-- <li>
												<a href="track-order.html"><i class="ti-truck"></i>Track your Order</a>
											</li> -->
											<li>
												<a href="{{url('/account')}}"><i class="ti-package"></i>My Orders</a>
											</li>
											<li>
												<a href="{{url('/account')}}"><i class="ti-user"></i>My Profile</a>
											</li>
											<li>
												<a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
											</li>
										</ul>
										@endif
									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>
		<!-- /main_nav -->
	</header>
	<!-- /header -->
	