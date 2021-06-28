@extends('wayshop.layouts.master')
@section('content')

	<main>
	    <div class="container margin_30">
	        <div class="row">
	            <aside class="col-lg-3" id="sidebar_fixed">
	                <div class="filter_col">
						@foreach($categories as $cat)
	                    <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
	                    <div class="filter_type version_2">
	                        <h4><a href="#filter_{{$cat->id}}" data-toggle="collapse" class="closed">{{$cat->name}} <small>({{ $cat->categories->count() }})</small></a></h4>
	                        <div class="collapse" id="filter_{{$cat->id}}">
	                            <ul>
								@foreach($cat->categories as $key=>$subcat)
	                                <li>
	                                    <label class="container_check"><a href="{{url('/categories/'.$subcat->id)}}">{{$subcat->name}} </a>
										 </label>
	                                </li>
									@endforeach
	                            </ul>
	                        </div>
	                    </div>
						@endforeach
	                   
	                </div>
	            </aside>
	            <!-- /col -->
	            <div class="col-lg-9">
	                <div class="top_banner">
	                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
	                        <div class="container pl-lg-5">
	                            <div class="breadcrumbs">
	                                <ul>
	                                    <li><a href="{{url('/')}}">Home</a></li>
	                                    <li>Page active</li>
	                                </ul>
	                            </div>
	                            <h1>{{ isset($product_banners) ? $product_banners->name : '' }} - {{ isset($product_banners) ? $product_banners->text_style : '' }}</h1>
	                        </div>
	                    </div>
						@if(isset($product_banners))               
	                    <img src="{{ asset('uploads/banners/'.$product_banners->image) }}" class="img-fluid" alt="">
						@endif
	                </div>
	                <!-- /top_banner -->
	                <div id="stick_here"></div>
	                <div class="toolbox elemento_stick add_bottom_30">
	                    <div class="container">
	                        <ul class="clearfix">
	                            <li>
	                                <div class="sort_select">
	                                    <select name="sort" id="sort">
	                                        <option value="popularity" selected="selected">Sort by popularity</option>
	                                        <option value="rating">Sort by average rating</option>
	                                        <option value="date">Sort by newness</option>
	                                        <option value="price">Sort by price: low to high</option>
	                                        <option value="price-desc">Sort by price: high to
	                                    </select>
	                                </div>
	                            </li>
	                            <li>
	                                <a href="#0"><i class="ti-view-grid"></i></a>
	                                <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
	                            </li>
	                            <li>
	                                <a href="#0" class="open_filters">
	                                    <i class="ti-filter"></i><span>Filters</span>
	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	                <!-- /toolbox -->
	               <div class="row small-gutters">
				   @if(!empty($product_search))
				   		@foreach($searchProducts as $product)
								<div class="col-6 col-md-4">
									<div class="grid_item">
										<!-- <span class="ribbon off">-30%</span> -->
										<figure>
											<a href="{{url('/products/'.$product->id)}}">
												<img class="img-fluid lazy" src="uploads/products/{{$product->image}}" data-src="uploads/products/{{$product->image}}" alt="">
											</a>
											<!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
										</figure>
										<a href="{{url('/products/'.$product->id)}}">
											<h3>{{$product->name}}</h3>
										</a>
										<div class="price_box">
											<span class="new_price">Rs. {{$product->price}}</span>
											<!-- <span class="old_price">$60.00</span> -->
										</div>
										<ul>
											<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
											<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
											<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
										</ul>
									</div>
									<!-- /grid_item -->
								</div>	
						@endforeach
						@else
							@foreach($products as $product)
									<div class="col-6 col-md-4">
										<div class="grid_item">
											<!-- <span class="ribbon off">-30%</span> -->
											<figure>
												<a href="{{url('/products/'.$product->id)}}">
													<img class="img-fluid lazy" src="uploads/products/{{$product->image}}" data-src="uploads/products/{{$product->image}}" alt="">
												</a>
												<!-- <div data-countdown="2019/05/15" class="countdown"></div> -->
											</figure>
											<a href="{{url('/products/'.$product->id)}}">
												<h3>{{$product->name}}</h3>
											</a>
											<div class="price_box">
												<span class="new_price">Rs. {{$product->price}}</span>
												<!-- <span class="old_price">$60.00</span> -->
											</div>
											<ul>
												<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
												<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
												<li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
											</ul>
										</div>
										<!-- /grid_item -->
									</div>	
							@endforeach
					@endif
					</div>
					<!-- /row -->
	                <div class="pagination__wrapper">
	                    <ul class="pagination">
	                        <li>{{ $products->links()}}</li>
	                    </ul>
	                </div>
	            </div>
	            <!-- /col -->
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!-- /main -->


@endsection