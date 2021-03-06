@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/shop_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/shop_responsive.css')}}">
	<!-- Home -->
<?php
use App\Model\Admin\Brand;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
    $brand=Brand::all();
    $category=Category::all();
    $scategory=Subcategory::all();

?>
	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
       
			<h2 class="home_title">Search Result</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								@foreach($category as $row)
                                <li><a href="{{route('pages.category',$row->id)}}">{{$row->category_name}}</a></li>
								@endforeach
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range"></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach($brand as $row)
                                <li class="brand"><a href="{{route('pages.brand',$row->id)}}">{{$row->brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>{{count($search)}}</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

							<!-- Product Item -->
                            @foreach($search as $row)
							<div class="product_item is_new">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset($row->image_one)}}" style="width:100px;height:100px;" alt=""></div>
								<div class="product_content">
                                @if($row->discount_price)
                                    <div class="product_price">${{$row->discount_price}}<span>${{$row->selling_price}}</span></div>
                                @else
									<div class="product_price">${{$row->selling_price}}</div>
								@endif
                                    <div class="product_name"><div><a href="{{route('product.details',$row->id)}}" tabindex="0">{{$row->product_name}}</a></div></div>
								</div>
								<button class="addwishlist " data-id="{{$row->id}}">
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </button>
								<ul class="product_marks">
                                @if($row->discount_price)
                                <!-- <li class="product_mark product_discount">{{($row->selling_price-$row->discount_price)/$row->selling_price *100}}</li> -->
								<li class="product_mark product_new " style="background-color:red;">{{intval(($row->selling_price-$row->discount_price)/$row->selling_price *100)}}%</li>
                                @else
                                <li class="product_mark product_new">new</li>
                                @endif
									
								</ul>
							</div>
                            @endforeach

							

							
							

							

						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                                {{$search->links()}}
                            </div>

					</div>

				</div>
			</div>
		</div>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="{{asset('public/frontend/js/shop_custom.js')}}"></script>
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

@endsection