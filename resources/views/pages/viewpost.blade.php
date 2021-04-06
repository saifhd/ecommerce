@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<!-- Single Blog Post -->
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_single_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_single_responsive.css')}}">

<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/frontend/images/blog_single_background.jpg')}}" data-speed="0.8"></div>
	</div>


<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">{{$post->post_title}}</div>
					<div class="single_post_text">
						<p></p>

						<div class="single_post_quote text-center">
							<div class="quote_image"><img src="{{asset($post->post_image)}}" alt=""></div>
							
							<div class="quote_name"><h4>{{$post->category->category_name}}</h4></div>
						</div>

						<p>{!!$post->post_details!!} </p>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- <script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script> -->


<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('public/frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{asset('public/frontend/js/blog_single_custom.js')}}"></script>
</body>

@endsection