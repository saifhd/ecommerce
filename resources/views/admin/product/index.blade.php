@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Product Table</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Product List <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-warning" style="float : right;">Add New</a></h6>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Product Code</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Category</th>
                  <th class="wd-15p">Brand</th>
                  <th class="wd-15p">Quantity</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-20p">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($product as $pro)
                <tr>
                  <td>{{$pro->product_code}}</td>
                  <td>{{$pro->product_name}}</td>

                  <td>
                  @if($pro->image_one)
                    <img src="{{URL::to($pro->image_one)}}" height="50px" width="50px" alt="">
                  @endif
                  </td>
                  {{-- @dd($pro->categories()->get()->category_name) --}}
                  <td>{{$pro->categories->category_name}}</td>
                  <td>{{$pro->brand->brand_name}}</td>
                  <td>{{$pro->product_quantity}}</td>
                  <td>

                    @if($pro->status==1)
                      <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                  </td>
                  @endif
                  <td><a href="{{route('edit.product',$pro->id)}}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                  <a href="{{route('delete.product',$pro->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>
                  <a href="{{route('product.show',$pro->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
                  <!-- <a href="{{route('product.inactive',$pro->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a> -->
                  @if($pro->status==1)
                  <a href="{{route('product.inactive',$pro->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a>
                  @else
                  <a href="{{route('product.active',$pro->id)}}" class="btn btn-sm btn-info"><i class="fa fa-thumbs-up"></i></a>

                  @endif

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
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
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

                <form action="{{route('store.brand')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label id="" for="brandName">Brand Name</label>
                        <input type="text" class="form-control" placeholder="Brand Name" id="categoryName" name="brand_name">
                    </div>
                    <div class="form-group">
                        <label id="" for="brandName">Brand Logo</label>
                        <input type="file" class="form-control" placeholder="Brand Logo"  name="brand_logo">
                    </div>
              </div>modal-body
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection
