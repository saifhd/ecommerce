@extends('layouts.app')

@section('content')
@include('layouts.menubar')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/blog_responsive.css')}}">


<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{asset('public/frontend/images/shop_background.jpg')}}"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Technological Blog</h2>
		</div>
	</div>

<!-- Blog -->

<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
						<!-- Blog post -->
                    @foreach($post as $row)
						<div class="blog_post">
							<div class="blog_image text-center" >
                            @if($row->post_image)
                            <img src="{{asset($row->post_image)}}" alt="" style=" width:230px;height:230px;">
                            @endif
                            </div>
							<br><br><br><div class="blog_text">{{$row->post_title}}</div>
							<div class="blog_button"><a href="{{route('blog.single.post',$row->id)}}">Continue Reading</a></div>
						</div>

						
					@endforeach

					</div>
				</div>

					
			</div>
		</div>
	</div>
<script src="{{asset('public/frontend/js/jquery-3.3.1.min.js' )}}"></script>
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
<script src="{{asset('public/frontend/js/blog_custom.js')}}"></script>

@endsection