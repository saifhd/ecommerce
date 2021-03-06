 
@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}">

<?php
	$settings=App\Model\Setting::all()->first();
	$charge=$settings->shipping_charge;
	$vat=$settings->vat;
	
?>
<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Checkout</div>
						<div class="cart_items">
							<ul class="cart_list">
                            @foreach($cart as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image text-center"><br><img src="{{asset($row->options->image)}}" style="width:70px;height:70px;" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$row->name}}</div>
										</div>
                                        @if($row->options->colour)
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Colour</div>
											<div class="cart_item_text"><span style="background-color:{{$row->options->colour}};"></span>{{$row->options->colour}}</div>
										</div>
                                        @else
                                        
                                        @endif

                                        @if($row->options->size)
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$row->options->size}}</div>
										</div>
                                        @else
                                        
                                        @endif
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div><br>
                                            <form action="{{route('update.cart.item')}}" method="post">
                                            @csrf
                                                <input type="hidden" value="{{$row->rowId}}" name="productId">
                                                <input type="number" name="qty" value="{{$row->qty}}" style="width:50px;">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check-square"></i></button>
                                            </form>
											
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">${{$row->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">${{$row->price * $row->qty}}</div>
										</div>
                                        <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
                                            <br>
											<a href="{{route('cart.remove',$row->rowId)}}" class="btn btn-sm btn-danger">X</a>
										</div>
									</div>
								</li>
                            @endforeach
							</ul>
						</div>
						
						<!-- Order Total -->
                    <div class="row">
                    <div class="col-lg-6">
						<div class="order_total_content" style="padding:15px;">
                            @if(Session::has('coupon'))

							@else
							<h4 style=";">Apply Coupon</h4>
                            <form action="{{route('apply.coupon')}}" method="post">
							@csrf
                                <div class="form-group">
                                    <input type="text" name="coupon" class="form-control" Placeholder="Enter Your Coupon" required>
                                    <br><button class="btn btn-danger ml-2" style="float:right;">Submit</button>
                                </div>
                            </form>
							@endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="list-group" style="padding:15px;">
						@if(Session::has('coupon'))
							<li class="list-group-item">SubTotal: <span style="float:right;">${{Session::get('coupon')['balance']}}</span></li>
							<li class="list-group-item">Coupon: ({{Session::get('coupon')['name']}}) <a href="{{route('remove.coupon')}}" class="btn btn-sm btn-danger">X</a><span style="float:right;">{{Session::get('coupon')['discount']}}</span></li>
						@else
							<li class="list-group-item">Subtotal: <span style="float:right;">{{Cart::Subtotal()}}</span></li>
							<li class="list-group-item">Coupon: <span style="float:right;"></span></li>
						@endif
                            
							
                            <li class="list-group-item">Shipping: <span style="float:right;">${{$charge}}</span></li>
                            
                            @if(Session::has('coupon'))
								<li class="list-group-item">Vat: ({{$vat}}%) <span style="float:right;">${{Session::get('coupon')['balance']*$vat/100}}</span></li>
								<li class="list-group-item">Total: <span style="float:right;">{{Session::get('coupon')['balance']+$charge+Cart::Subtotal()*$vat/100}}</span></li>
							@else
								<li class="list-group-item">Vat: ({{$vat}}%) <span style="float:right;">${{Cart::Subtotal()*$vat/100}}</span></li>
								<li class="list-group-item">Total: <span style="float:right;">{{Cart::Subtotal()+$charge+Cart::Subtotal()*$vat/100}}</span></li>
							@endif
							
						
                        </ul>
                    </div>
                    </div>
                        </div>
                        </div>
                        </div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">All Clear</button>
							<a href="{{route('payment.step')}}" class="button cart_button_checkout">Final Step</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


    <script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection