@extends('admin.admin_layouts')


   

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Create Product</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product Details Page
          </h6>
          
        
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: </label>
                    <br><strong>{{$product->product_name}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: </label>
                  <br><strong>{{$product->product_code}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: </label>
                  <br><strong>{{$product->product_quantity}}</strong>
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: </label>
                  <br>
                  <strong>{{$product->categories->category_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: </label>
                  
                  <br>
                  <strong>{{$product->scategories->subcategory_name}}</strong>
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: </label>
                  <br>
                  <strong>{{$product->brand->brand_name}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: </label>
                  <br>
                  <strong>{{$product->product_size}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour: </label>
                  <br>
                  <strong>{{$product->product_colour}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: </label>
                  <br>
                  <strong>{{$product->selling_price}}</strong>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: </label>
                    <br>
                    <strong>{!!$product->product_detail!!}</strong>
                 
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: </label>
                  <br>
                  <strong>{{$product->video_link}}</strong>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file1">Image One (Main Thumbnail): </label>
                  <label class="custom-file">
                    
                  <img src="{{URL::to($product->image_one)}}" alt="" style="width:100px;height:100px;">
                    
                </label>
                <strong></strong>
                <br>
                
                </div>
              </div><!-- col-4 -->
              
                

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file2"> Image Two: </label>
                  
                  <label class="custom-file">
                    
                  <img src="{{URL::to($product->image_two)}}" alt="" style="width:100px;height:100px;">
                   
                </label>
                <br>
                <img src="#" id="two" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file3">Image Three: </label>
                  
                  <label class="custom-file">
                  <img src="{{URL::to($product->image_three)}}" alt="" style="width:100px;height:100px;">
                    
                </label>
                <br>
                <img src="#" id="three" alt="">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->

            <hr><br>
            <div class="row">
                <div class="col-lg-4">
                <label class="">
                    @if($product->main_slider==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->main_slider==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Main Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="">
                @if($product->hot_deal==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->hot_deal==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Hot Deal</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="">
                @if($product->best_seller==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->best_seller==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Best Rated</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="">
                @if($product->trent==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->trent==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Trend Products</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="">
                @if($product->mid_slider==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->mid_slider==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Mid Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="">
                @if($product->hot_new==1)
                      <span class="badge badge-success">Active</span>
                    @elseif($product->hot_new==0)
                    <span class="badge badge-danger">Inactive</span>
                    

                    @endif
                    
                    <span>Hot New</span>
                    </label>
                </div>
                
                
            </div>
            


            




            
            
          </div><!-- form-layout -->
          
        </div><!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
@endsection
