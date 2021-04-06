@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update Coupon</h5>
          
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
                

                <form action="{{route('update.coupon',$coupon->id)}}" method="post">
                @csrf
                    <div class="form-group">
                        <label id="" for="categoryName">Coupon Code</label>
                        <input type="text" class="form-control" value="{{$coupon->coupon}}" id="categoryName" name="coupon">
                    </div>   
                    <div class="form-group">
                        <label id="" for="categoryName">Coupon Discount</label>
                        <input type="text" class="form-control" value="{{$coupon->discount}}" id="discount" name="discount">
                    </div>  
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