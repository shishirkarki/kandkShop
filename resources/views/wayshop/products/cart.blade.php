@extends('wayshop.layouts.master')
@section('content')


	<main class="bg_gray">
		<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{{ (Request::is('/cart') ? 'active' : '') }}}">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Cart page</h1>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Product
									</th>
									<th>
										Price
									</th>
									<th>
										Quantity
									</th>
									<th>
										Subtotal
									</th>
									<th>
										
									</th>
								</tr>
							</thead>
							<tbody>
								<?php $total_amount = 0; ?>
                       			@foreach($userCart as $cart)
									<tr>
										<td>
											<div class="thumb_cart">
												<img src="{{asset('/uploads/products/'.$cart->image)}}" data-src="{{asset('/uploads/products/'.$cart->image)}}" class="lazy" alt="Image">
											</div>
											<span class="item_cart">{{$cart->product_name}}</span>
										</td>
										<td>
											<strong>Rs. {{$cart->price}}</strong>
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
										<td>
											<strong>Rs {{$cart->price*$cart->quantity}}</strong>
										</td>
										<td class="options">
											<a href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="ti-trash"></i></a>
										</td>
									</tr>
								<?php $total_amount = $total_amount + ($cart->price*$cart->quantity); ?>
								@endforeach
									
							</tbody>
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-right">
							<button type="button" class="btn_1 gray">Update Cart</button>
						</div>
							<div class="col-sm-8">
							<div class="apply-coupon">
								<form action="{{url('/cart/apply-coupon')}}" method="post"> {{csrf_field()}}
									<div class="form-group form-inline">
										<input type="text" class="form-control" name="coupon_code" value="" placeholder="Promo code" class="form-control">
										<button type="submit" class="btn_1 outline">Apply Coupon</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
			@if(!empty(Session::get('CouponAmount')))
				<li>
					<span>Subtotal</span> Rs. <?php echo $total_amount; ?>
				</li>
				<li>
					<span>Coupon Discount</span> Rs <?php echo Session::get('CouponAmount'); ?>
				</li>
				<li>
					<span>Total</span> Rs. <?php echo $total_amount - Session::get('CouponAmount'); ?>
				</li>
				@else
				<li>
					<span>Total</span> Rs. <?php echo $total_amount; ?>
				</li>
				@endif
			</ul>
			<a href="{{url('/checkout')}}" class="btn_1 full-width cart">Proceed to Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		
	</main>
	<!--/main-->
			
	


@endsection