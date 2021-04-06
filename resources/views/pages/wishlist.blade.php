
@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/cart_responsive.css')}}">

<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                            @foreach($product as $row)
								<li class="cart_item clearfix">
									<div class="cart_item_image text-center"><br><img src="{{asset($row->products1->image_one)}}" style="width:70px;height:70px;" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text">{{$row->products1->product_name}}</div>
										</div>
                                        @if($row->products1->product_colour)
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Colour</div>
											<div class="cart_item_text">{{$row->products1->product_colour}}</div>
										</div>
                                        @else
                                        
                                        @endif

                                        @if($row->products1->product_size)
                                        <div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Size</div>
											<div class="cart_item_text">{{$row->products1->product_size}}</div>
										</div>
                                        @else
                                        
                                        @endif
										
										
                                        <div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Action</div>
                                            <br>
											<a href="{{route('add.cart',$row->id)}}" class="btn btn-sm btn-success">AddtoCart</a>
										</div>
									</div>
								</li>
                            @endforeach
							</ul>
						</div>
						
						

						
					</div>
				</div>
			</div>
		</div>
	</div>


    <script src="{{asset('public/frontend/js/cart_custom.js')}}"></script>
@endsection