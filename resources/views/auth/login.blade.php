@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">      





        <!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 offset-lg-1" style="border:1px solid grey; padding:20px; border-radius:25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign In</div>

						<form action="{{route('login')}}" method="post" id="contact_form">
							@csrf
							<div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                            <small  class="form-text text-muted">We'll never share your email anyone else </small>
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
							</div> 
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
							@error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
							</div> 
							<div class="form-group">
								<button type="submit" class="btn btn-info">Login</button>
							</div>
						</form>
                        <br>
						<a href="{{route('password.request')}}">I Forgot My Password</a><br><br>
                        
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i>  Login with Google</a>

					</div>
				</div>

                <div class="col-lg-5 offset-lg-1" style="border:1px solid grey; padding:20px; border-radius:25px;">
					<div class="contact_form_container">
						<div class="contact_form_title text-center">Sign Up</div>

						<form action="{{route('register')}}"  method="post" id="contact_form">
						@csrf
							
                            <div class="form-group">
                                <label for="name">FullName</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
							</div>  
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                
							</div>  
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                
							</div>  
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
							</div> 
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
							</div> 
							<div class="form-group">
								<button type="submit" class="btn btn-info">Signup</button>
							</div>

						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

@endsection
