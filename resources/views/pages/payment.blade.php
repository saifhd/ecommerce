@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">      


<?php
	$settings=App\Model\Setting::all()->first();
	$charge=$settings->shipping_charge;
	$vat=$settings->vat;
	
?>


        <!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-7" style="border:1px solid grey; padding:20px; border-radius:25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Cart Products</div>


                        <div class="cart_items">
							<ul class="cart_list">
                            @foreach($cart as $row)
								<li class="cart_item clearfix">
									
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										
                                    <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>Image</b></div>
											<div class="cart_item_text"><img src="{{asset($row->options->image)}}" style="width:50px;height:50px;" alt=""></div>
										</div>
                                        <div class="cart_item_name cart_info_col">
											<div class="cart_item_title"><b>Name</b></div>
											<div class="cart_item_text">{{$row->name}}</div>
										</div>
                                        @if($row->options->colour)
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title"><b>Colour</b></div>
											<div class="cart_item_text"><span style="background-color:{{$row->options->colour}};"></span>{{$row->options->colour}}</div>
										</div>
                                        @else
                                        
                                        @endif

                                        @if($row->options->size)
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>Size</b></div>
											<div class="cart_item_text">{{$row->options->size}}</div>
										</div>
                                        @else
                                        
                                        @endif
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title"><b>Quantity</b></div><br>
                                            <div class="cart_item_text">{{$row->qty}}</div>
                                            
											
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title"><b>Price</b></div>
											<div class="cart_item_text">${{$row->price}}</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title"><b>Total</b></div>
											<div class="cart_item_text">${{$row->price * $row->qty}}</div>
										</div>
                                        
									</div>
								</li>
                            @endforeach
							</ul>
						</div>

                        <ul class="list-group col-lg-8" style="float:right;">
                            @if(Session::has('coupon'))
                                <li class="list-group-item">SubTotal: <span style="float:right;">${{Session::get('coupon')['balance']}}</span></li>
                                <li class="list-group-item">Coupon: ({{Session::get('coupon')['name']}}) <span style="float:right;">${{Session::get('coupon')['discount']}}</span></li>
                            @else
                                <li class="list-group-item">Subtotal: <span style="float:right;">${{Cart::Subtotal()}}</span></li>
                                <li class="list-group-item">Coupon: <span style="float:right;"></span></li>
                            @endif
                            
							
                            <li class="list-group-item">Shipping: <span style="float:right;">${{$charge}}</span></li>
                            
                            @if(Session::has('coupon'))
								<li class="list-group-item">Vat: ({{$vat}}%) <span style="float:right;">${{Session::get('coupon')['balance']*$vat/100}}</span></li>
								<li class="list-group-item">Total: <span style="float:right;">{{Session::get('coupon')['balance']+$charge+Cart::Subtotal()*$vat/100}}</span></li>
							@else
								<li class="list-group-item">Vat: ({{$vat}}%) <span style="float:right;">${{Cart::Subtotal()*$vat/100}}</span></li>
								<li class="list-group-item">Total: <span style="float:right;">${{Cart::Subtotal()+$charge+Cart::Subtotal()*$vat/100}}</span></li>
							@endif
							
                        </ul>


					
                        <br>
						
					</div>
				</div>

                <div class="col-lg-5 " style="border:1px solid grey; padding:20px; border-radius:25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Shipping Address</div>

						<form action="{{route('payment.process')}}"  method="post" id="contact_form">
						@csrf
							
                            <div class="form-group">
                                <label for="name">FullName</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
							</div>  
                            
                            <div class="form-group">
                                <label for="name">Phone</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('name') }}" required placeholder="Enter Your Phone Number" autofocus>
                                
							</div>  
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" id="name" class="form-control @error('name') is-invalid @enderror" name="email" placeholder="Emter Your Email" required autocomplete="name" autofocus>
                                
							</div>  
                            <div class="form-group">
                                <label for="name">Address</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="address"  required placeholder="Enter Your Address" autofocus>
                                
							</div>  
                            <div class="form-group">
                                <label for="name">City</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="city" placeholder="Enter Your City" required autocomplete="name" autofocus>
                                
							</div>  
                            <div class="contect_form_title text-center">
                                <h3>Payment By</h3>
                            </div>

                            <div class="form-group">
                                <ul class="logos_list">
                                    <li><input type="radio" name="payment" value="stripe"><img src="{{asset('public/frontend/images/mastercard.png')}}" style="width:100px;height:60px;" alt=""></li>
                                    <li><input type="radio" name="payment" value="paypal"><img src="{{asset('public/frontend/images/paypal.png')}}" style="width:100px;height:60px;" alt=""></li>
                                    <li><input type="radio" name="payment" value="mollie"><img src="{{asset('public/frontend/images/mollie.png')}}" style="width:100px;height:60px;" alt=""></li>
                                </ul>
                            </div>

							<div class="form-group text-center">
								<button type="submit" class="btn btn-info">Pay Now</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

@endsection
