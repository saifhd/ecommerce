@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">      


<?php
	$settings=App\Model\Setting::all()->first();
	$charge=$settings->shipping_charge;
    $vat=$settings->vat;
    $cart=Cart::content();
	
?>
<style>
    .StripeElement{
        box-sizing:border-box;
        height:40px;
        width:100%;
        padding:10px 12px;
        border:1px solid transparent;
        border-radius:4px;
        background-color:white;
        box-shadow:0 1px 3px 0 #e6ebf1;
        -webkit-transition:box-shadow 150ms ease;
        transition:box-shadow 150ms ease;

    }
    .StripeElement--focus{
        box-shadow:0 1px 3px 0 #cfd7df;

        
    }
    .StripeElement--invalid{
        border-color:#fa755a;
        
        
    }
    .StripeElement--webkit-autofill{
        background-color:#fefde5 !important;
        
        
    }
</style>


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

						<form action="{{route('stripe.charge')}}" method="post" id="payment-form">
                        @csrf
                            <div class="form-row">
                                <label for="card-element">
                                Credit or debit card
                                </label>
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display Element errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <input type="hidden" name="shipping" value="{{$charge}}">
                            <input type="hidden" name="vat" value="{{$vat}}">
                            <input type="hidden" name="total" value="{{Cart::Subtotal()+$charge+Cart::Subtotal()*$vat/100}}">
                            <input type="hidden" name="ship_name" value="{{$data['name']}}">
                            <input type="hidden" name="ship_phone" value="{{$data['phone']}}">
                            <input type="hidden" name="ship_email" value="{{$data['email']}}">
                            <input type="hidden" name="ship_address" value="{{$data['address']}}">
                            <input type="hidden" name="ship_city" value="{{$data['city']}}">
                            <input type="hidden" name="payment" value="{{$data['payment']}}">
                            
                            
                            <br>
                            <button type="submit" class="btn btn-info">Pay Now</button>
                        </form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>
<script type="text/javascript">
    var stripe = Stripe('pk_test_51GxHHTF72ZfWswJginVXSSmEkv9cJPM3jAAoykAMhJxfWZDYLTcwrKk6pBOtIUJe0CgglCoVGW9yB9tYJhzksjdz00hdPaBH28');
    var elements = stripe.elements();
</script>
<script type="text/javascript">
    // Custom styling can be passed to options when creating an Element.
    var style = {
    base: {
        // Add your base input styles here. For example:
        fontSize: '16px',
        color: '#32325d',
    },
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
</script>
<script type="text/javascript">
    // Create a token or display an error when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
        // Inform the customer that there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
        } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
        }
    });
    });
</script>
<script type="text/javascript">
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
        }
</script>
@endsection
