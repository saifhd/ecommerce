@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"><h4>Edit Profile Details</h4>
          
        <form method="post" action="{{route('profile.update')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Userame: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{$user->name}}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="email"  value="{{$user->email}}">
                        </div>
                    </div>

                </div><!-- row -->
            </div>
            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Update</button>
              
            </div><!-- form-layout-footer -->
          
        </form>
    </div><!-- card -->

    
        


<br><br><br>
    <div class="">
        <div class="card pd-20 pd-sm-40">
            <h4 class="card-body-title">Update Profile Image
            </h4><br>
            

            <form method="post" action="{{route('update.profile.image')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
            
                        <label class="form-control-label" for="file1">Profile Image: <span class="tx-danger">*</span></label>
                        <br>
                        <label class="custom-file">
                        <input type="file" id="file1" class="custom-file-input" name="image_one" onchange="readURL1(this);" >
                        <span class="custom-file-control"></span>
                
                
                    
                        <br>
                        <img src="#" id="one" alt="">
                
                    </div><!-- col-4 -->
                    <div class="col-lg-6 col-sm-6">
                        <img src="{{asset($user->avatar)}}" alt="" style="width:80px;height:80px;">
                    </div>


            
                </div>
                <button type="submit" class="btn btn-sm btn-info" style="float:right;">Update Images</button>
                
            </form>
            
            
            
        </div>

       
    </div>
</div>
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