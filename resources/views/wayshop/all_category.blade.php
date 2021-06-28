@extends('wayshop.layouts.master')
@section('content')

	<main>
    <div class="top_banner">
	        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
	            <div class="container">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="#">Home</a></li>
	                        <li><a href="#">Category</a></li>
	                        <li>Page active</li>
	                    </ul>
	                </div>
	                <h1>Shoes - Grid listing</h1>
	            </div>
	        </div>
	        <img src="img/bg_cat_shoes.jpg" class="img-fluid" alt="">
	    </div>
	    <!-- /top_banner -->
	    <div class="container margin_30">
	        <div class="row">
                @foreach($categories as $cat)
                <aside class="col-lg-3">
                    <div class="filter_col">
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
                    
                    </div>
                </aside>
                @endforeach
	            
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	</main>
	<!-- /main -->


@endsection