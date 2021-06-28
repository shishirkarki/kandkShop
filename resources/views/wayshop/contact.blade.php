@extends('wayshop.layouts.master')
@section('content')

<main class="bg_gray">
	
			<div class="container margin_60">
				<div class="main_title">
					<h2>Contact</h2>
					<p>If you have any querry please dont hasitate to message us. We are always here for your help.</p>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-support"></i>
							<h2>Help Center</h2>
							<a href="#0">+977 {{ isset($home_settings) ? $home_settings->phone_no : '' }}</a> - <a href="#0">{{ isset($home_settings) ? $home_settings->gmail : '' }}</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map-alt"></i>
							<h2>Our Store</h2>
							<div>{{ isset($home_settings) ? $home_settings->address : '' }}</div>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-package"></i>
							<h2>TO Orders</h2>
							<a href="#0">+977 {{ isset($home_settings) ? $home_settings->phone_no : '' }}</a> - <a href="{{url('/shop')}}">Shop</a>
							<small>MON to FRI 9am-6pm SAT 9am-2pm</small>
						</div>
					</div>
				</div>
				<!-- /row -->				
			</div>
			<!-- /container -->
		<div class="bg_white">
			<div class="container margin_60_35">
				<h4 class="pb-3">Drop Us a Line</h4>
				<div class="row">
					<div class="col-lg-4 col-md-6 add_bottom_25">
                        <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text" placeholder="Name *">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" id="email" placeholder="Email *">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" style="height: 150px;" name="message" id="message" placeholder="Message *"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn_1 full-width" type="submit" value="Submit">
                            </div>
                        </form>
					</div>
					<div class="col-lg-8 col-md-6 add_bottom_25">
					<iframe class="map_contact" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39714.47749917409!2d-0.13662037019554393!3d51.52871971170425!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondra%2C+Regno+Unito!5e0!3m2!1sit!2ses!4v1557824540343!5m2!1sit!2ses" style="border: 0" allowfullscreen></iframe>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>
	<!--/main-->



    

@endsection