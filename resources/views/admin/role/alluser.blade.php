@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Admin Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Admin List <a href="{{route('create.admin')}}" class="btn btn-sm btn-warning" style="float : right;" 
          >Create New Admin</a></h6>
          
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Name</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-20p">Access</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($user as $row)
                <tr>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
                  <td>
                  @if($row->category==1)
                  <span class="badge badge-primary">Category</span>
                  @endif
                  @if($row->coupon==1)
                  <span class="badge badge-success">Coupon</span>
                  @endif
                  @if($row->product==1)
                  <span class="badge badge-danger">Product</span>
                  @endif
                  @if($row->blog==1)
                  <span class="badge badge-info">Blog</span>
                  @endif
                  @if($row->order_pro==1)
                  <span class="badge badge-warning">Order</span>
                  @endif
                  @if($row->other==1)
                  <span class="badge badge-primary">Others</span>
                  @endif
                  @if($row->report==1)
                  <span class="badge badge-success">Report</span>
                  @endif
                  @if($row->role==1)
                  <span class="badge badge-danger">Role</span>
                  @endif
                  @if($row->return_pro==1)
                  <span class="badge badge-info">Return</span>
                  @endif
                  @if($row->contact==1)
                  <span class="badge badge-warning">Contact</span>
                  @endif
                  @if($row->comment==1)
                  <span class="badge badge-primary">Comments</span>
                  @endif
                  @if($row->setting==1)
                  <span class="badge badge-success">Settings</span>
                  @endif
                  @if($row->stock==1)
                  <span class="badge badge-info">Stock</span>
                  @endif
                  
                  
                  </td>
                  <td><a href="{{route('edit.admin',$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                  <a href="{{route('delete.admin',$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  
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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
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

                <form action="{{route('add.category')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label id="" for="categoryName">Category Name</label>
                        <input type="text" class="form-control" placeholder="Category" id="categoryName" name="category_Name">
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