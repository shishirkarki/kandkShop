@extends('wayshop.layouts.master')
@section('content')

    <main class="bg_gray"> 
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/cart')}}">Shopping Cart</a></li>
                        <li><a href="{{url('/checkout')}}">Check Out</a></li>
                        <li class="{{{ (Request::is('/order-review') ? 'active' : '') }}}"><strong>Final Order-Review</strong></li>
                    </ul>
                </div>
                <h1>Our Final Review:</h1>
                
            </div>
            <!-- /page_header -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="step middle payments">
                        <h3>1. Billing Address</h3>
                        <div class="box_general summary">
                            <ul>
                                <li class="clearfix"><em><strong>Name     :</strong> {{$userDetails->name}}</em></li>
                                <li class="clearfix"><em><strong>Address  :</strong> {{$userDetails->address}}</em></li>
                                <li class="clearfix"><em><strong>City     :</strong> {{$userDetails->city}}</em></li>
                                <li class="clearfix"><em><strong>State    :</strong> {{$userDetails->state}}</em></li>
                                <li class="clearfix"><em><strong>Country  :</strong> {{$userDetails->country}}</em></li>
                                <li class="clearfix"><em><strong>PinCode  :</strong> {{$userDetails->pincode}}</em></li>
                                <li class="clearfix"><em><strong>Mobile No:</strong> {{$userDetails->mobile}}</em></li>
                                
                            </ul>
                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="step last">
                        <h3>2. Shipping Address</h3>
                        <div class="box_general summary">
                            <ul>
                                <li class="clearfix"><em><strong>Name     :</strong> {{$shippingDetails->name}}</em></li>
                                <li class="clearfix"><em><strong>Address  :</strong> {{$shippingDetails->address}}</em></li>
                                <li class="clearfix"><em><strong>City     :</strong> {{$shippingDetails->city}}</em></li>
                                <li class="clearfix"><em><strong>State    :</strong> {{$shippingDetails->state}}</em></li>
                                <li class="clearfix"><em><strong>Country  :</strong> {{$shippingDetails->country}}</em></li>
                                <li class="clearfix"><em><strong>PinCode  :</strong> {{$shippingDetails->pincode}}</em></li>
                                <li class="clearfix"><em><strong>Mobile No:</strong> {{$shippingDetails->mobile}}</em></li>
                                
                            </ul>
                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
            </div>
            <!-- /row -->

            <div class="col-lg-12 col-md-6">
					<div class="step last">
						<h3>3. Product Details</h3>
                        <div class="box_general summary">
                            <section id="cart_items">
                                <div class="container">
                                    <!-- <div class="breadcrumbs">
                                        <ol class="breadcrumb">
                                        <li><a href="#">Home</a></li>
                                        <li class="active">Shopping Cart</li>
                                        </ol>
                                    </div> -->
                                    <div class="table-responsive cart_info">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr class="cart_menu">
                                                    <td class="image">Product</td>
                                                    <td class="description">Name</td>
                                                    <td class="price">Price</td>
                                                    <td class="quantity">Quantity</td>
                                                    <td class="total">Total</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $total_amount = 0; ?>
                                            @foreach($userCart as $cart)
                                                <tr>
                                                    <td class="cart_product">
                                                        <a href=""><img src="{{asset('/uploads/products/'.$cart->image)}}" alt="" width="100" height="100"></a>
                                                    </td>
                                                    <td class="cart_description">
                                                        <h4><a href="">{{$cart->product_name}}</a></h4>
                                                        <p>Code: {{$cart->product_code}} | Size : {{$cart->size}}</p>
                                                    </td>
                                                    <td class="cart_price">
                                                        <p>Rs {{$cart->price}}</p>
                                                    </td>
                                                    <td class="cart_quantity">
                                                        <div class="cart_quantity_button">
                                                            <a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
                                                            <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" min="0" step="1">
                                                            @if($cart->quantity>1)
                                                            <a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
                                                            @endif 
                                                        </div>
                                                    </td>
                                                    <td class="cart_total">
                                                        <p class="cart_total_price">Rs {{$cart->price*$cart->quantity}}</p>
                                                    </td>
                                                    <td class="cart_delete">
                                                        <a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section> <!--/#cart_items-->
                        </div>
					    <!-- /box_general -->
					</div>
					<!-- /step -->
			</div>
            <!-- Start Cart  -->
            

            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="step middle payments">
                        <h3>4. Your Final Payment</h3>
                    <div class="box_general summary">
                        <ul>
                            <li class="clearfix"><em><strong>Sub Total</strong></em>  <span>Rs. {{$total_amount}}</span></li>
                            <li class="clearfix"><em><strong>Shipping Cost (+)</strong></em> <span>Rs. 0</span></li>
                            <li class="clearfix"><em><strong>Coupon Discount</strong></em> 
                                <span>
                                    @if(!empty(Session::get('CouponAmount')))
                                    Rs. {{Session::get('CouponAmount')}}
                                    @else
                                    Rs. 0
                                    @endif
                                </span>
                            </li>

                        </ul>
                        <div class="total clearfix">TOTAL <span>Rs. {{$grand_total = $total_amount - Session::get('CouponAmount')}}</span></div>
                    </div>
                    <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="step last">
                        <h3>5. Payment Method</h3>
                        <div class="box_general summary">
                            <form name="paymentForm" id="paymentForm" action="{{url('/place-order')}}" method="post"> {{csrf_field()}}
                                <input type="hidden" value="{{$grand_total}}" name="grand_total">
                                    <div class="d-block">
                                        <div class="custom-control custom-radio">
                                            <input id="credit" name="payment_method" value="cod"  type="radio" class="custom-control-input cod">
                                            <label class="custom-control-label" for="credit"><strong>Cash On Delivery</strong></label>
                                        </div>
                                        <br>
                                        <div class="d-flex">
                                            <button  type="submit" class="btn_1 full-width" onclick="return selectPaymentMethod();" style="color:white;">Place Order</button> 
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <!-- /box_general -->
                    </div>
                    <!-- /step -->
                </div>
            </div>
        </div>
    </main>
@endsection