@extends('wayshop.layouts.master')
@section('content')

<main class="bg_gray">
		<div class="top_banner general">
			<div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-lg-8 col-md-6 text-right">
							<h1>{{ isset($aboutus_banners) ? $aboutus_banners->banner_name : '' }}<br>Thank Your For Joining Us</h1>
						</div>
					</div>
				</div>
			</div>
            @if(isset($aboutus_banners))
			<img src="{{asset(('uploads/aboutus_banners/'.$aboutus_banners->banner_image))}}" class="img-fluid" alt="">

            @else
			<img src="{{asset('front_asset/img/aboutus_banner.jpg')}}" class="img-fluid" alt="">
            @endif
            
		</div>
		<!--/top_banner-->
		
		<div class="container margin_60_35 add_bottom_30">
				<div class="main_title">
					<h2>About Us</h2>
					<p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
				</div>
				<div class="row justify-content-center align-items-center">
					@foreach($aboutus_service as $service)
					<div class="col-lg-5">

						<div class="box_about">
							<h2>{{ $service->service_title}}</h2>
							<p class="lead">{{ $service->service_intro}}</p>
							<p>{{ $service->service_description}}</p>
							<img src="{{asset('front_asset/img/arrow_about.png')}}" alt="" class="arrow_1">
						</div>
					</div>
					<div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
							<img src="{{ asset('uploads/aboutus_services/'.$service->service_image) }}" alt="" class="img-fluid" width="350" height="268">
					</div>
					@endforeach
				</div>
			</div>
			<!-- /container -->
		


            <!-- Testomonial -->
            <div id="carousel-home">
			<div class="owl-carousel owl-theme">
                @foreach($aboutus_testimonials as $testimonial)
                    <div class="owl-slide cover" style="background-image: url({{ asset('uploads/aboutus_testimonials/'.$testimonial->testimonial_image) }});">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-6 static">
                                        <div class="slide-text white">
                                            <h2 class="owl-slide-animated owl-slide-title">"{{$testimonial->testimonial_title}}"</h2>
                                            <p class="owl-slide-animated owl-slide-subtitle">
                                                <em>{{$testimonial->testimonial_feedback}}</em>
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta"><small>{{$testimonial->testimonial_name }} - {{$testimonial->testimonial_post}}</small></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>
			<div id="icon_drag_mobile"></div>
		</div>
		<!--/carousel-->

        <!-- Why Choose Allaia -->
			<div class="bg_white">
				<div class="container margin_60_35">
					<div class="main_title">
						<h2>Why Choose Allaia</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-medall-alt"></i>
								<h3>+ 1000 Customers</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-help-alt"></i>
								<h3>H24 Support</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-gift"></i>
								<h3>Great Sale Offers</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-headphone-alt"></i>
								<h3>Help Direct Line</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-wallet"></i>
								<h3>Secure Payments</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="box_feat">
								<i class="ti-comments"></i>
								<h3>Support via Chat</h3>
								<p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
							</div>
						</div>
					</div>
					<!--/row-->
				</div>
			</div>
			<!-- /bg_white -->
		
		


		


      <!-- staff -->
        <div class="container margin_60">
			<div class="main_title">
				<h2>Meet Our Staff</h2>
				<p>Hardwork workers with smart technique.</p>
			</div>
			<div class="owl-carousel owl-theme carousel_centered">
                @foreach($aboutus_staff as $staff)
				<div class="item">
					<a href="#0">
						<div class="title">
							<h4>{{ $staff->staff_name }}<em>{{ $staff->staff_post }}</em></h4>
						</div><img src="{{ asset('uploads/aboutus_staffs/'.$staff->staff_image) }}" alt="">
					</a>
				</div>
                @endforeach
			</div>
			<!-- /carousel -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->









    

@endsection