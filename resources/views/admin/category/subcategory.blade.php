@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Sub Category Table</h5>
          
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Sub Category List <a href="" class="btn btn-sm btn-warning" style="float : right;" 
          data-toggle="modal" data-target="#modaldemo3">Add New</a></h6>
          
          
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Sub Category Name</th>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-20p">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                @foreach($category->scategories as $key)
                <tr>
                  <td>{{$key->id}}</td>
                  <td>{{$key->subcategory_name}}</td>
                  <td>{{$category->category_name}}</td>
                  <td><a href="{{route('edit.subcategory',$key->id)}}" class="btn btn-sm btn-info">Edit</a>
                  <a href="{{route('delete.subcategory',$key->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                  
                  </td>
                  
                </tr>
                @endforeach

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

                <form action="{{route('store.subcategory')}}" method="post">
                @csrf
                    <div class="form-group">
                        <label id="" for="subcategory_name">Sub Category Name</label>
                        <input type="text" class="form-control" placeholder="Category" id="categoryName" name="subcategory_name">
                    </div>  
                    <div class="form-group">
                        <label id="" for="category_id1">Category Name</label>
                        <select name="category_id" id="category_id1" class="form-control">
                        @foreach($categories as $row)
                            <option value="{{$row->id}}" >{{$row->category_name}}</option>
                        @endforeach
                        </select>
                        
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