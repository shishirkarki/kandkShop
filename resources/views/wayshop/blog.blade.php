@extends('wayshop.layouts.master')
@section('content')

<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<div class="breadcrumbs">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{{ (Request::is('/blog') ? 'active' : '') }}}">Blog</a></li>
					</ul>
				</div>
				<h1>Our Blog &amp; News</h1>
			</div>
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-9">
					<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
						<div class="form-group">
							<input type="text" name="search" id="search" class="form-control" placeholder="Search..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="row">
					@foreach($blogs as $blog)
						<div class="col-md-6">
							<article class="blog">
								<figure>
									<a href="{{ url('blog-details/'.$blog->id) }}"><img src="{{ asset('/uploads/blog/'.$blog->image) }}" alt="">
										<div class="preview"><span>Read more</span></div>
									</a>
								</figure>
								<div class="post_info">
									<small>Admin - {{$blog->created_at}}</small>
									<h2><a href="{{ url('blog-details/'.$blog->id) }}">{{$blog->blog_title}}</a></h2>
									<p>{{$blog->blog_intro}}</p>
									<!-- <ul>
										<li>
											<div class="thumb"><img src="img/avatar.jpg" alt=""></div> Admin
										</li>
										<li><i class="ti-comment"></i>20</li>
									</ul> -->
								</div>
							</article>
							<!-- /article -->
						</div>
					@endforeach
						<!-- /col -->
					</div>
					<!-- /row -->

					<div class="pagination__wrapper">
	                    <ul class="pagination">
	                        <li>{{ $blogs->links()}}</li>
	                    </ul>
	                </div>
					<!-- /pagination -->

				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
						<div class="form-group">
							<input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
							<button type="submit"><i class="ti-search"></i><span class="sr-only">Search</span></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Latest Post</h4>
						</div>
						<ul class="comments-list">
							@foreach($latest_blog as $blog)
							<li>
								<div class="alignleft">
									<a href="{{ url('blog-details/'.$blog->id) }}"><img src="{{ asset('/uploads/blog/'.$blog->image) }}" alt=""></a>
								</div>
								<small>Create at - {{$blog->created_at}}</small>
								<h3><a href="{{ url('blog-details/'.$blog->id) }}" title="">{{$blog->blog_title}}...</a></h3>
							</li>
							@endforeach
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Latest Categories</h4>
						</div>
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
					</div>
					<!-- /widget -->
					<!-- <div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Food</a>
							<a href="#">Bars</a>
							<a href="#">Cooktails</a>
							<a href="#">Shops</a>
							<a href="#">Best Offers</a>
							<a href="#">Transports</a>
							<a href="#">Restaurants</a>
						</div>
					</div> -->
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->





    

@endsection