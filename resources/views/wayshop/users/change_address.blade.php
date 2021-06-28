@extends('wayshop.layouts.master')
@section('content')

<main class="bg_gray">
		
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{url('/')}}">Home</a></li>
					<!-- <li><a href="#">Category</a></li> -->
					<li>Page active</li>
				</ul>
		</div>
		<h1>Your profile</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="client">Change Password</h3>
					<div class="form_container">
						<!-- <div class="row no-gutters">
							<div class="col-lg-6 pr-lg-1">
								<a href="#0" class="social_bt facebook">Login with Facebook</a>
							</div>
							<div class="col-lg-6 pl-lg-1">
								<a href="#0" class="social_bt google">Login with Google</a>
							</div>
						</div>
						<div class="divider"><span>Or</span></div> -->
                        <form action="{{url('/change-password')}}" method="POST" id="contactForm registerForm"> {{csrf_field()}}
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="old_pwd" name="old_pwd" placeholder="Enter Your Current Password*">
                            </div>
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Your Current Password*">
                            </div>
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" id="new_pwd" name="new_pwd" value="" placeholder="Enter Your New Password*">
                            </div>
                            <div class="text-center"><input type="submit" value="Save Change" class="btn_1 full-width"></div>
                        </form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<div class="row">
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Find Locations</li>
							<li>Quality Location check</li>
							<li>Data Protection</li>
						</ul>
					</div>
					<div class="col-md-6 d-none d-lg-block">
						<ul class="list_ok">
							<li>Secure Payments</li>
							<li>H24 Support</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Change Your Address</h3> <small class="float-right pt-2">* Required Fields</small>
					<div class="form_container">
                        <form action="{{url('/change-address')}}" method="POST" id="contactForm registerForm"> {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{$userDetails->name}}" name="name" id="name" placeholder="Name*">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" value="{{$userDetails->state}}" name="state" id="state" placeholder="State Name*">
                            </div>
                            <hr>
                            <div class="private box">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$userDetails->address}}" id="address" name="address" placeholder="Full Address*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$userDetails->city}}" id="city" name="city" placeholder="City*">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$userDetails->pincode}}" id="pincode" name="pincode" placeholder="Postal Code*">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                
                                <div class="row no-gutters">
                                    <div class="col-6 pr-1">
                                        <div class="form-group">
                                            <div class="custom-select-form">
                                                <input type="text" class="form-control" value="{{$userDetails->country}}" id="country" name="country" placeholder="Country Name *">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 pl-1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="{{$userDetails->mobile}}" id="mobile" name="mobile" placeholder="Telephone *">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                
                            </div>
                            <hr>
                            <div class="text-center"><input type="submit" value="Update" class="btn_1 full-width"></div>
                        </form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->

@endsection