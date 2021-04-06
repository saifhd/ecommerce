@extends('admin.admin_layouts')


   

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Site Settings</span>
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin
          </h6>
          <p class="mg-b-20 mg-sm-b-30">Edit Site Settings Form</p>
        <form method="post" action="{{route('admin.update.setting',$setting->id)}}" enctype="multipart/form-data">
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
            <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company_Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_name" value="{{$setting->company_name}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone1" value="{{$setting->phone1}}" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone <span>(Optional)</span>: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone2" value="{{$setting->phone2}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" value="{{$setting->email}}" required="">
                </div>
              </div><!-- col-4 -->
              
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Company Address: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="company_address" value="{{$setting->company_address}}" required="">
                </div>
              </div><!-- col-4 -->
              

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="facebook" value="{{$setting->facebook}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">YouTube: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="youtube" value="{{$setting->youtube}}" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="instagram" value="{{$setting->instagram}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Twitter: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="twitter" value="{{$setting->twitter}}">
                </div>
              </div><!-- col-4 -->
              
              
              


              

            </div><!-- row -->
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                
                  <label class="form-control-label" for="file2"> Logo: <span class="tx-danger">*</span></label>
                  <br>
                  <label class="custom-file">
                    <input type="file" id="file2" class="custom-file-input" name="image_two" onchange="readURL2(this);" >
                    <span class="custom-file-control"></span>
                    
                   
                </label>
                <br>
                <img src="#" id="two" alt="">
              </div><!-- col-4 -->
                <div class="col-lg-6 col-sm-6">
                @if($setting->logo)
                  <img src="{{URL::to($setting->logo)}}" alt="" style="width:80px;height:80px;">
                @endif
                </div>
              
            </div>
            <hr><br>
            
            <br>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Update</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    
    
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

@endsection
