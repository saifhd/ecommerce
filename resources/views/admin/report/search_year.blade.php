@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Search By Year</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">{{$year}} Order Report <span style="float:right" class="badge badge-success"><h5>Total: ${{$total}}</h5></span></h6>
          <br><br>
          
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap" style="widht:100%;">
              <thead>
                <tr>
                  <th class="wd-15p">Payment Type</th>
                  <th class="wd-15p">Transaction ID</th>
                  <th class="wd-15p">Sub Total</th>
                  
                  <th class="wd-20p">Total</th>
                  <th class="wd-20p">Date</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
              @foreach($order as $coupon)
                <tr>
                  <td>{{$coupon->payment_type}}</td>
                  <td>{{$coupon->balance_transection}}</td>
                  <td>{{$coupon->subtotal}}</td>
                  
                  <td>{{$coupon->total}}</td>
                  <td>{{$coupon->date}}</td>
                  <td><span class="badge badge-success">Delevered</span>
                    
                  </td>
                  <td><a href="{{route('admin.view.order',$coupon->id)}}" class="btn btn-sm btn-info">View</a>
                  
                  
                  </td>
                  
                </tr>
                

                @endforeach
                
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        

        
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Coupon Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body pd-20">

              @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item">{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
              @endif

                <form action="{{route('store.coupon')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label id="" for="categoryName">Coupon Code</label>
                        <input type="text" class="form-control" placeholder="Coupon" id="categoryName" name="coupon">
                    </div>   
                    <div class="form-group">
                        <label id="" for="discount">Coupon Discount</label>
                        <input type="text" class="form-control" placeholder="Discount" id="discount" name="discount">
                    </div>  
              </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form> 
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection