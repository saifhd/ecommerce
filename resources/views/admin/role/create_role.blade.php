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
          <p class="mg-b-20 mg-sm-b-30">New Admin Add Form</p>
        <form method="post" action="{{route('admin.store.role')}}" >
        @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" placeholder="Enter User Name" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email" placeholder="Enter User Email" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  placeholder="Enter User Phone" required="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password"  placeholder="Enter Password" required="">
                </div>
              </div><!-- col-4 -->
              
              


              

            </div><!-- row -->

            <hr><br>
            <div class="row">
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="category" value="1">
                    <span>Category</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="coupon" value="1">
                    <span>Coupon</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="product" value="1">
                    <span>Product</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="blog" value="1">
                    <span>Blog</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="order_pro" value="1">
                    <span>Order</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="other" value="1">
                    <span>Other</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="report" value="1">
                    <span>Report</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="role" value="1">
                    <span>Role</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="return_pro" value="1">
                    <span>Return</span>
                    </label>
                </div>
                
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="comment" value="1">
                    <span>Comment</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="setting" value="1">
                    <span>Settings</span>
                    </label>
                </div>
                <div class="col-lg-4">
                <label class="ckbox">
                    <input type="checkbox" name="contact" value="1">
                    <span>Contact</span>
                    </label>
                </div>
                <label class="ckbox">
                    <input type="checkbox" name="stock" value="1">
                    <span>Stock</span>
                    </label>
                </div>
                
                
            </div>
            <br>


            




            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->

       
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    
    


@endsection