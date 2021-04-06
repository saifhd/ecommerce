@extends('admin.admin_layouts')


   

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Admin Section</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Edit Admin Form</p>
        <form method="post" action="{{route('admin.update.profile',$admin->id)}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" value="{{$admin->name}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" value="{{$admin->email}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  value="{{$admin->phone}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password"  value="">
                </div>
              </div><!-- col-4 -->
              
              


              

            </div><!-- row -->

            <hr><br>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label" for="file1">Image One (Main Thumbnail): <span class="tx-danger">*</span></label>
                  <br>
                  <label class="custom-file">
                    <input type="file" id="file1" class="custom-file-input" name="image_one" onchange="readURL1(this);" >
                    <span class="custom-file-control"></span>
                    
                    
                    </label>
                    <br><br>
                    <img src="#" id="one" alt="">
                    
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-sm-6">
                    @if($admin->avatar)
                        <img src="{{URL::to($admin->avatar)}}" alt="" style="width:80px;height:80px;">
                    @else
                    <img src="{{asset('public/media/Profile_Images/avatar.jpg')}}" alt="" style="width:100px;height:100px;">
                    @endif
                    </div>


                
                </div>
            </div>
            <br>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div>
        <!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    
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
