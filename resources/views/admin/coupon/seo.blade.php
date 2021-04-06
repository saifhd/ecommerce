@extends('admin.admin_layouts')


   

@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">SEO Settings</a>
        
      </nav>

      <div class="sl-pagebody">

      <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SEO Settings</h6>
          
        <form method="post" action="{{route('update.seo')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$seo->id}}">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_title" value="{{$seo->meta_title}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Author: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_author" value="{{$seo->meta_author}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Meta Tag: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="meta_tag" value="{{$seo->meta_tag}}">
                </div>
              </div><!-- col-4 -->
              
              
              
              

              

              

             
              

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Meta Description: <span class="tx-danger">*</span></label>
                  <textarea class="form-control" name="meta_description"  cols="30" rows="5">{{$seo->meta_describtion}}</textarea>
                 
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Google Analytics: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="google_analytics" value="{{$seo->google_analytics}}">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Bing Analytics: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="bing_analytics" value="{{$seo->bing_analytics}}">
                </div>
              </div><!-- col-4 -->


              
             
                
             
             

            </div><!-- row -->

            <hr>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              <button class="btn btn-secondary">Cancel</button>
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
