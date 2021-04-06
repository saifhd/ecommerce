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
        <form method="post" action="{{route('admin.update.role',$admin->id)}}" >
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
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="category" value="1" <?php if($admin->category==1){ echo "checked";}?>>
                    <span>Category</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="coupon" value="1" <?php if($admin->coupon==1){ echo "checked";}?>>
                    <span>Coupon</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="product" value="1" <?php if($admin->product==1){ echo "checked";}?>>
                    <span>Product</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="blog" value="1" <?php if($admin->blog==1){ echo "checked";}?>>
                    <span>Blog</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="order_pro" value="1" <?php if($admin->order_pro==1){ echo "checked";}?>>
                    <span>Order</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="other" value="1" <?php if($admin->other==1){ echo "checked";}?>>
                    <span>Other</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="report" value="1" <?php if($admin->report==1){ echo "checked";}?>>
                    <span>Report</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="role" value="1" <?php if($admin->role==1){ echo "checked";}?>>
                    <span>Role</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="return_pro" value="1" <?php if($admin->return_pro==1){ echo "checked";}?>>
                    <span>Return</span>
                    </label>
                </div>
                
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="comment" value="1" <?php if($admin->comment==1){ echo "checked";}?>>
                    <span>Comment</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="setting" value="1" <?php if($admin->setting==1){ echo "checked";}?>>
                    <span>Settings</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="contact" value="1" <?php if($admin->contact==1){ echo "checked";}?>>
                    <span>Contact</span>
                    </label>
                </div>

                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="stock" value="1" <?php if($admin->stock==1){ echo "checked";}?>>
                    <span>Stock</span>
                    </label>
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
    
    


@endsection
