@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Brand</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title"></h6>
          
          
          <div class="table-wrapper">
          @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
                

                <form action="{{route('update.brand',$brand->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label id="" for="categoryName">Brand Name</label>
                        <input type="text" class="form-control" value="{{$brand->brand_name}}" id="categoryName" name="brand_name">
                    </div>   
                    <div class="form-group">
                        <label id="" for="brandlogo">Brand Logo</label>
                        <input type="file" class="form-control"  id="brandlogo" name="brand_logo">
                    </div> 
                    @if($brand->brand_logo)
                    <div class="form-group">
                        <label id="" for="oldbrandlogo">Old Brand Logo</label>
                        <br>
                        <img src="{{URL::to($brand->brand_logo)}}" alt="" id="oldbrandlogo" width="90px" height="70px">
                    </div>
                    @endif 
              </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                        
                    </div>
                </form> 
          </div><!-- table-wrapper -->
        </div><!-- card -->

        
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
          
@endsection