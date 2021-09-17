<!-- Banner -->
<?php
		$product=App\Model\Admin\Product::where('main_slider',1)->orderBy('id','DESC')->first();
		// dd($product);
	?>

	<div class="banner">
		<div class="banner_background" style="background-image:url({{asset('/frontend/images/banner_background.jpg')}})"></div>
		<div class="container fill_height">
			<div class="row fill_height">
                {{-- @dd($product) --}}
                @if(!is_null($product))
				    <div class="banner_product_image"><img src="{{URL::to($product->image_one)}}" alt=""></div>

                    <div class="col-lg-5 offset-lg-4 fill_height">
                        <div class="banner_content">
                            <h1 class="banner_text">{{$product->product_name}}</h1>
                            @if($product->discount_price)
                            <div class="banner_price"><span>${{$product->selling_price}}  </span>${{$product->discount_price}}</div>
                            @else
                            <div class="banner_price">${{$product->selling_price}}</div>
                            @endif
                            <div class="banner_product_name">{{$product->brand->brand_name}}</div>
                            <div class="button banner_button"><a href="{{route('product.details',$product->id)}}">Shop Now</a></div>

                        </div>
                    </div>
                @endif
			</div>
		</div>
	</div>
