<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Ecommerce Site Admin Panel</title>

    <!-- vendor css -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link href="{{asset('/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('/backend/css/starlight.css')}}">

      <!-- DataTable CSS -->
    <link href="{{asset('/backend/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">



  </head>

  <body>

   @guest


    @else
        <!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
    <div class="sl-sideleft">


      <br>
      <div class="sl-sideleft-menu">
        <a href="{{route('admin.home')}}" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        @if(Auth::user()->category==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Category</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('categories')}}" class="nav-link">Category</a></li>
          <li class="nav-item"><a href="{{route('sub.category')}}" class="nav-link">SubCategory</a></li>
          <li class="nav-item"><a href="{{route('brands')}}" class="nav-link">Brand</a></li>

        </ul>
        @endif


        @if(Auth::user()->coupon==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
            <span class="menu-item-label">Coupons</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.coupon')}}" class="nav-link">Coupon</a></li>

        </ul>
        @endif


        @if(Auth::user()->product==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Products</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.product.create')}}" class="nav-link">Add Product</a></li>
          <li class="nav-item"><a href="{{route('admin.product')}}" class="nav-link">All Products</a></li>
        </ul>
        @endif

        @if(Auth::user()->order_pro==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Orders</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.neworder')}}" class="nav-link">New Orders</a></li>
          <li class="nav-item"><a href="{{route('admin.accept.payment')}}" class="nav-link">Accept Payment</a></li>
          <li class="nav-item"><a href="{{route('admin.process.payment')}}" class="nav-link">Process Delevery</a></li>
          <li class="nav-item"><a href="{{route('admin.delevery.payment')}}" class="nav-link">Delivery Success</a></li>
          <li class="nav-item"><a href="{{route('admin.cancel.payment')}}" class="nav-link">Cancel Order</a></li>
        </ul>
        @endif


        @if(Auth::user()->blog==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
            <span class="menu-item-label">Blog</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('add.blog.categorylist')}}" class="nav-link">Blog Category</a></li>
          <li class="nav-item"><a href="{{route('add.blog.post')}}" class="nav-link">Add Post</a></li>
          <li class="nav-item"><a href="{{route('all.blog.post')}}" class="nav-link">Post List</a></li>
        </ul>
        @endif

        @if(Auth::user()->other==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Others</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.newsletter')}}" class="nav-link">Newsletters</a></li>
          <li class="nav-item"><a href="{{route('admin.seo')}}" class="nav-link">SEO Setting</a></li>
        </ul>
        @endif

        @if(Auth::user()->report==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Reports</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.today.order')}}" class="nav-link">Today Order</a></li>
          <li class="nav-item"><a href="{{route('admin.today.delevery')}}" class="nav-link">Today Delevery</a></li>
          <li class="nav-item"><a href="{{route('admin.this.month')}}" class="nav-link">This Month Order</a></li>
          <li class="nav-item"><a href="{{route('admin.search.report')}}" class="nav-link">Search Report</a></li>
        </ul>
        @endif

        @if(Auth::user()->role==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">User Role</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.today.order')}}" class="nav-link">Create User</a></li>
          <li class="nav-item"><a href="{{route('admin.all.user')}}" class="nav-link">All User</a></li>

        </ul>
        @endif

        @if(Auth::user()->return_pro==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Return Order</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.return.request')}}" class="nav-link">Return Request</a></li>
          <li class="nav-item"><a href="{{route('admin.all.request')}}" class="nav-link">All Request</a></li>

        </ul>
        @endif
        @if(Auth::user()->stock==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Product Stock</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.product.stock')}}" class="nav-link">Stock</a></li>

        </ul>
        @endif
        @if(Auth::user()->contact==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Contact Message</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">

          <li class="nav-item"><a href="{{route('admin.all.contact')}}" class="nav-link">All Messages</a></li>

        </ul>
        @endif


        @if(Auth::user()->setting==1)
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
            <span class="menu-item-label">Site Settings</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{route('admin.site.setting')}}" class="nav-link">Site Setting</a></li>


        </ul>
        @endif

      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{Auth::user()->name}}</span>
              <img src="{{asset(Auth::user()->avatar)}}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{route('edit.admin.profile',auth()->user()->id)}}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                <li><a href="{{route('admin.password.change')}}"><i class="icon ion-ios-gear-outline"></i> Settings</a></li>



                <li><a href="{{route('admin.logout')}}"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
              <?php


              ?>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
          <a id="btnRightMenu" href="" class="pos-relative">
            <i class="icon ion-ios-bell-outline"></i>
            <!-- start: if statement -->
            <span class="square-8 bg-danger"></span>
            <!-- end: if statement -->
          </a>
        </div><!-- navicon-right -->
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    <?php
      $messages=App\Model\Contact::where('status',0)->get();
    ?>
    <!-- ########## START: RIGHT PANEL ########## -->
    <div class="sl-sideright">
      <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">{{count($messages)}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">{{count($messages)}}</a>
        </li>
      </ul><!-- sidebar-tabs -->

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            @foreach($messages as $row)
            <a href="{{route('admin.message.read',$row->id)}}" class="media-list-link">
              <div class="media">
                <!-- <img src="{{asset('/backend/img/img3.jpg')}}" class="wd-40 rounded-circle" alt=""> -->
                <div class="media-body">
                <?php
                  $date=Carbon\Carbon::now()->diffForHumans($row->created_at);
                ?>
                  <p class="mg-b-0 tx-medium tx-gray-800 tx-13">{{$row->name}}</p>
                  <span class="d-block tx-11 tx-gray-500">{{$date}}</span>
                  <p class="tx-13 mg-t-10 mg-b-0">{{$row->message}}</p>
                </div>
              </div><!-- media -->
            </a>
            @endforeach

          </div><!-- media-list -->
          <div class="pd-15">
            <a href="{{route('admin.all.contact')}}" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
          </div>
        </div><!-- #messages -->

        <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
          <div class="media-list">
            <!-- loop starts here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img8.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                  <span class="tx-12">October 03, 2017 8:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <!-- loop ends here -->
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img9.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                  <span class="tx-12">October 02, 2017 12:44am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img10.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">October 01, 2017 10:20pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">October 01, 2017 6:08pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img8.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                  <span class="tx-12">September 27, 2017 6:45am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img10.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                  <span class="tx-12">September 28, 2017 11:30pm</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img9.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                  <span class="tx-12">September 26, 2017 11:01am</span>
                </div>
              </div><!-- media -->
            </a>
            <a href="" class="media-list-link read">
              <div class="media pd-x-20 pd-y-15">
                <img src="{{asset('/backend/img/img5.jpg')}}" class="wd-40 rounded-circle" alt="">
                <div class="media-body">
                  <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                  <span class="tx-12">September 23, 2017 9:19pm</span>
                </div>
              </div><!-- media -->
            </a>
          </div><!-- media-list -->
        </div><!-- #notifications -->

      </div><!-- tab-content -->
    </div><!-- sl-sideright -->
    <!-- ########## END: RIGHT PANEL ########## --->
    @endguest
    @yield('admin_content')



    <script src="{{asset('/backend/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('/backend/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('/backend/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('/backend/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('/backend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>

    <script src="{{asset('/backend/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('/backend/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/backend/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('/backend/lib/select2/js/select2.min.js')}}"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>


    <script src="{{asset('/backend/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('/backend/lib/d3/d3.js')}}"></script>
    <script src="{{asset('/backend/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('/backend/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('/backend/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('/backend/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('/backend/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('/backend/lib/flot-spline/jquery.flot.spline.js')}}"></script>


    <script src="{{asset('/backend/lib/medium-editor/medium-editor.js')}}"></script>
    <script src="{{asset('/backend/lib/summernote/summernote-bs4.min.js')}}"></script>


    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          tooltip: false
        })
      });
    </script>

    <script src="{{asset('/backend/js/starlight.js')}}"></script>
    <script src="{{asset('/backend/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('/backend/js/dashboard.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>


     <script>
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Are you Want to delete?",
                  text: "Once Delete, This will be Permanently Delete!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Safe Data!");
                  }
                });
            });
    </script>
  </body>
</html>
