@extends('admin.admin_layouts')


   

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Update Blog Post</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Blog Post Update
          <a href="{{route('all.blog.post')}}" class="btn btn-success btn-sm" style="float : right;">All Posts</a></h6>
          <p class="mg-b-20 mg-sm-b-30">Blog Post Update Form</p>
        <form method="post" action="{{route('update.blog.post',$post->id)}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Post title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="post_title" value="{{$post->post_title}}">
                </div>
              </div><!-- col-4 -->
              
              
              
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2 text-capitalize" data-placeholder="Choose Category" name="category_id">
                  <option label="Choose Category" class="text-capitalize"></option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" <?php if($category->id==$post->category_id){ echo "selected";} ?>>{{$category->category_name}}</option>

                    @endforeach
                   
                    
                    
                    
                  </select>
                </div>
              </div><!-- col-4 -->

              

              

             
              

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="post_details" id="summernote" cols="30" rows="10">{{$post->post_details}}</textarea>
                 
                </div>
              </div><!-- col-4 -->


              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label" for="file1">Post Image: </label>
                  <label class="custom-file">
                    <input type="file" id="file1" class="custom-file-input" name="post_image" onchange="readURL1(this);">
                    <span class="custom-file-control"></span>
                    
                    
                    
                </label>
                
                <br><br>
                <img src="#" id="one" alt="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
              @if($post->post_image)
                    <img src="{{URL::to($post->post_image)}}" alt="" style="float:right; height:80px; width:80px;" >
                @endif
              </div>
              
                

             

            </div><!-- row -->

            <hr>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update Post</button>
              <!-- <button class="btn btn-secondary">Cancel</button> -->
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
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


@endsection
