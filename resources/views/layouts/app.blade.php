<?php
use App\Model\Admin\Site_Setting;
$setting=Site_Setting::all()->first();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/frontend/styles/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://js.stripe.com/v3/"></script>

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
                        @if(isset($setting))
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('/frontend/images/phone.png')}}" alt=""></div>{{$setting->phone1}} / {{$setting->phone2}}</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('/frontend/images/mail.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{{$setting->email}}</a></div>
						@endif
                        <div class="top_bar_content ml-auto">
							@guest

							@else
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">

									<li>
										<a href="#" data-toggle="modal" data-target="#exampleModal">My Order Tracking</a>
										<ul>


										</ul>
									</li>
								</ul>
							</div>
							@endguest

							@guest
							<div class="top_bar_user">
							<div><a href="{{route('login')}}">Register/Login</a></div>
							</div>
							@else
							<div class="top_bar_user">
								<ul class="standard_dropdown top_bar_dropdown">

									<li>
										<a href="{{route('home')}}"> <div class="user_icon">
										<img src="{{asset('/frontend/images/user.svg')}}" alt="" >
										</div>                               Profile <i class="fas fa-chevron-down"></i> </a>

										<ul>
											<li><a href="{{route('user.wishlist')}}">Wishlist</a></li>
											<li><a href="{{route('user.checkout')}}">Checklist</a></li>

										</ul>
									</li>
								</ul>
							</div>

							@endguest

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<?php
						$logo=App\Model\Admin\Site_Setting::all()->first();

					?>
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
                            @if(isset($logo))
							<div class="logo"><a href="{{url('/')}}"><img src="{{asset($logo->logo)}}" style="width:150px; height:150px;" alt=""></a></div>
                            @endif
                        </div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{route('product.search')}}" method="post" class="header_search_form clearfix">
										@csrf
										<input type="search" required="required" name="search" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<?php
													$categories=App\Model\Admin\Category::all();
												?>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">All Categories</a></li>
													@foreach($categories as $category)
													<li><a class="clc" href="#">{{$category->category_name}}</a></li>
													@endforeach


												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('/frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								@guest

								@else
								<?php
									$wishlist=App\Model\Wishlist::where('user_id',Auth::id())->get();
								?>
								<div class="wishlist_icon"><img src="{{asset('/frontend/images/heart.png')}}" alt=""></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{route('user.wishlist')}}">Wishlist</a></div>
									<div class="wishlist_count">{{count($wishlist)}}</div>
								</div>
							</div>
							@endguest

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<img src="{{asset('/frontend/images/cart.png')}}" alt="">
										<div class="cart_count"><span>{{Cart::count()}}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{route('show.cart')}}">Cart</a></div>
										<div class="cart_price">${{Cart::subtotal()}}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>





	@yield('content')

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
                        @if(isset($setting))
						<div class="logo_container">

							<div class="logo"><a href="#">{{$setting->company_name}}</a></div>

						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">{{$setting->phone1}}</div>
						<div class="footer_phone">{{$setting->phone2}}</div>
						<div class="footer_contact_text">
							<p>{{$setting->company_address}}</p>

						</div>
						<div class="footer_social">
							<ul>
								<li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
								<li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>
								<li><a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a></li>

							</ul>
						</div>
                        @endif
					</div>
				</div>





			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">

					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By SHD Software Solution by
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--Order Tracking Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('order.tracking')}}">
		@csrf
			<div class="modal-body">
				<label for="status">Status Code</label>
				<input type="text" class="form-control" name="status_code" id="status" required placeholder="Your Order Status Code">
			</div>
			<button type="submit" class="btn btn-danger" style="float:right;">Track Now</button>
		</form>
      </div>

    </div>
  </div>
</div>


<script src="{{asset('/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{asset('/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('/frontend/js/custom.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{asset('/frontend/js/product_custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>
	 	<script>
        	 $(document).on("click", "#return", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to Return?",
                  text: "Once Return, This will Return Your Money!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Cancel");
                  }
                });
            });
    	</script>
</body>

</html>
