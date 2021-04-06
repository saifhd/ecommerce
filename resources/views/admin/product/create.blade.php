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
          <h6 class="card-body-title">New Product Add
          <a href="{{route('admin.product')}}" class="btn btn-success btn-sm" style="float : right;">All Products</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New Product Add Form</p>
        <form method="post" action="{{route('store.product')}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_name" placeholder="Enter Product Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_code" placeholder="Enter Porduct Code">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_quantity"  placeholder="Enter Quantity">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Discounted Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="discount_price"  placeholder="Enter Discounted price">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2 text-capitalize" data-placeholder="Choose Category" name="category_id">
                  <option label="Choose Category" class="text-capitalize"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" >{{$category->category_name}}</option>

                    @endforeach
                   
                    
                    
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2 text-capitalize" data-placeholder="Choose Sub Category" name="subcategory_id">
                    <option label="Choose Sub Category"></option>
                   
                  </select>
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2 text-capitalize" data-placeholder="Choose Brand" name="brand_id">
                    <option label="Choose Brand"></option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>

                    @endforeach
                  </select>
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_size"  id="size" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Colour: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="product_colour"  id="colour" data-role="tagsinput">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="selling_price" placeholder="Enter Selling Price" >
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="product_detail" id="summernote" cols="30" rows="10"></textarea>
                 
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="video_link"  placeholder="Enter Video Link">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file1">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                  <label class="custom-file">
                    <input type="file" id="file1" class="custom-file-input" name="image_one" onchange="readURL1(this);" required="">
                    <span class="custom-file-control"></span>
                    
                    
                </label>
                <br>
                <img src="#" id="one" alt="">
                </div>
              </div><!-- col-4 -->
              
                

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file2"> Image Two: <span class="tx-danger">*</span></label>
                  <br>
                  <label class="custom-file">
                    <input type="file" id="file2" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                    <span class="custom-file-control"></span>
                    
                   
                </label>
                <br>
                <img src="#" id="two" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file3">Image Three: <span class="tx-danger">*</span></label>
                  <br>
                  <label class="custom-file">
                    <input type="file" id="file3" class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                    <span class="custom-file-control"></span>
                    
                    
                </label>
                <br>
                <img src="#" id="three" alt="">
                </div>
              </div><!-- col-4 -->

            </div><!-- row -->

            <hr><br>
            <div class="row">
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="main_slider" value="1">
                    <span>Main Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="hot_deal" value="1">
                    <span>Hot Deal</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="best_seller" value="1">
                    <span>Best Rated</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="trent" value="1">
                    <span>Trend Products</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="mid_slider" value="1">
                    <span>Mid Slider</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="hot_new" value="1">
                    <span>Hot New</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="buyone_getone" value="1">
                    <span>BuyOne GetOne</span>
                    </label>
                </div>
                
                
            </div>
            <br>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
     $('select[name="category_id"]').on('change',function(){
          var category_id = $(this).val();
          if (category_id) {
            
            $.ajax({
              url: "{{ url('/get/subcategory/') }}/"+category_id,
              type:"GET",
              dataType:"json",
              success:function(data) { 
              var d =$('select[name="subcategory_id"]').empty();
              $.each(data, function(key, value){
              
              $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

              });
              },
            });

          }else{
            alert('danger');
          }

            });
      });

    </script>
    <script type="text/javascript">
  function readURL1(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
