@extends('layouts.app')

@section('content')
@include('layouts.menubar')

<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/product_responsive.css')}}">
<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="{{asset($product->image_one)}}"><img src="{{asset($product->image_one)}}" alt=""></li>
                        @if($product->image_two)
                            <li data-image="{{asset($product->image_two)}}"><img src="{{asset($product->image_two)}}" alt=""></li>
                        @endif
                        @if($product->image_three)
                            <li data-image="{{asset($product->image_three)}}"><img src="{{asset($product->image_three)}}" alt=""></li>
                        @endif
						
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{asset($product->image_one)}}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><h4>{{$product->categories->category_name}}</h4> {{$product->scategories->subcategory_name}}</div>
						<div class="product_name">{{$product->product_name}}</div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p>{!! str_limit($product->product_detail , $limit=600) !!}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{route('product.add.cart',$product->id)}}" method="post">
							@csrf
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<!-- <div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div> -->
                               
									<div class="row">
                                    @if($product->product_colour)
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="select1">Colour</label>
                                                <select name="colour" id="select1" class="form-control input-lg">
                                                    @foreach($product_colour as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                    
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if($product->product_size)
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="select2">Size</label>
                                                <select name="size" id="select2" class="form-control input-lg">
                                                @foreach($product_size as $row)
                                                        <option value="{{$row}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="select2">Quantity</label>
                                                <input type="number" class="form-control" name="qty">
                                            </div>
                                        </div>
                                    </div>

								</div>
                                
                                @if($product->discount_price)
                                    <div class="product_price">${{$product->discount_price}} <span>${{$product->selling_price}}</span></div>
                                @else
                                    <div class="product_price">${{$product->selling_price}}</div>
                                @endif
								
								<div class="button_container">
                                
									<button type="submit" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
                                        
                                    
								</div>
								<br><br>
								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<div class="addthis_inline_share_toolbox"></div>
							
                                
                                
								
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

    



	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Product Details</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Product Details</a>
                            <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Video Link</a>
                            <a class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Product Review</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">{!!$product->product_detail!!}</div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">{{$product->video_link}}</div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="JvxMcAzM"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$('.addwishlist').on('click',function(){
				var id=$(this).data('id');
				if(id){
					$.ajax({
						url:"{{url('add/wishlist/')}}/"+id,
						type:"GET",
						datType:"json",
						success:function(data){
							const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								})
								if($.isEmptyObject(data.error)){
									Toast.fire({
									icon: 'success',
									title: data.success
									})
								
								}
								else{
									Toast.fire({
									icon: 'error',
									title: data.error
									})

								}
								
						},
					});
				}
				// else{
				// 	alert('danger');
				// }
			});
		});
	
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.addcart').on('click',function(){
				var id=$(this).data('id');
				
				if(id){
					$.ajax({
						url:"{{url('add/to/cart/')}}/"+id,
						type:"GET",
						datType:"json",
						success:function(data){
							const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								})
								if($.isEmptyObject(data.error)){
									Toast.fire({
									icon: 'success',
									title: data.success
									})
								
								}
								else{
									Toast.fire({
									icon: 'error',
									title: data.error
									})

								}
								
						},
					});
				}
				// else{
				// 	alert('danger');
				// }
			});
		});
	
	</script>
    
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5eac31c66b26bea5"></script>

@endsection