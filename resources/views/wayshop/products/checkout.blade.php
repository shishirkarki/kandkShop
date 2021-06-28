@extends('wayshop.layouts.master')
@section('content')

<div class="contact-box-main">

    <div class="container">
        @if(Session::has('flash_message_error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_error') }}</strong>
    </div>
    @endif
    @if(Session::has('flash_message_success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ session('flash_message_success') }}</strong>
    </div>
    @endif
    <form name="checkoutFrom" id="checkoutFrom" action="{{url('/checkout')}}" method="post"> {{csrf_field()}}
    <div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li><a href="{{url('/cart')}}">Shopping Cart</a></li>
				  <li class="{{{ (Request::is('/cart') ? 'active' : '') }}}"><strong>Check Out</strong></li>
				</ol>
			</div>
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Billing To</h2>
                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->name)) value="{{$userDetails->name}}" @endif name="billing_name" id="billing_name" placeholder="Enter Your Name" placeholder="Enter Your Address" required data-error="Enter Your Address">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->address)) value="{{$userDetails->address}}" @endif  name="billing_address" id="billing_address" placeholder="Enter Your Address" required data-error="Enter Your Address">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->city)) value="{{$userDetails->city}}" @endif name="billing_city" id="billing_city" placeholder="Enter Your City Name" required data-error="Enter Your City Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->state)) value="{{$userDetails->state}}" @endif name="billing_state" id="billing_state" placeholder="Enter Your State Name" required data-error="Enter Your State Name">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="billing_country" id="billing_country" class="form-control">
                                        <option value="1">Select Country</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_name}}"  @if(!empty($userDetails->country) && $country->country_name == $userDetails->country) selected @endif>{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->pincode)) value="{{$userDetails->pincode}}" @endif name="billing_pincode" id="billing_pincode" placeholder="Enter Any code you remember" required data-error="Enter Any code you remember">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"  @if(!empty($userDetails->mobile)) value="{{$userDetails->mobile}}" @endif name="billing_mobile" id="billing_mobile" placeholder="Enter Your Mobile Number" required data-error="Enter Your Mobile Number">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            
                             <div class="col-md-12">
                                <div class="form-group" style="margin-left:30px;">
                                    <input  type="checkbox" class="form-check-input" id="billtoship">
                                    <label class="form-check-label" for="billtoship">Shipping Address Same As Billing Address</label>
                                </div>
                            </div> 
                        </div>
                   
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="contact-form-right">
                    <h2>Shipping To</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company Name" @if(!empty($shippingDetails->name)) value="{{$shippingDetails->name}}" @endif name="shipping_name" id="shipping_name" placeholder="Enter Your Name" required data-error="Enter Your Address">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  @if(!empty($shippingDetails->address)) value="{{$shippingDetails->address}}" @endif name="shipping_address" id="shipping_address" placeholder="Enter Your Address" required data-error="Enter Your Address">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  @if(!empty($shippingDetails->city)) value="{{$shippingDetails->city}}" @endif name="shipping_city" id="shipping_city" placeholder="Enter Your City Name" required data-error="Enter Your City Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  @if(!empty($shippingDetails->state)) value="{{$shippingDetails->state}}" @endif name="shipping_state" id="shipping_state" placeholder="Enter Your State Name" required data-error="Enter Your State Name">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="shipping_country" id="shipping_country" class="form-control">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                <option value="{{$country->country_name}}"@if(!empty($shippingDetails->country) && $country->country_name == $shippingDetails->country) selected @endif>
                                    {{$country->country_name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  @if(!empty($shippingDetails->pincode)) value="{{$shippingDetails->pincode}}" @endif name="shipping_pincode" id="shipping_pincode" placeholder="Enter code That You Remember" required data-error="Enter code That You Remember">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control"  @if(!empty($shippingDetails->mobile)) value="{{$shippingDetails->mobile}}" @endif name="shipping_mobile" id="shipping_mobile" placeholder="Enter Your Mobile Number" required data-error="Enter Your Mobile Number">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="submit-button text-center">
                                <!-- <button class="btn hvr-hover" type="submit">Checkout</button> -->
                                <button class="btn_1 full-width cart" type="submit">Checkout</button>
                               
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        
        </div>
        </form>
    </div>


@endsection