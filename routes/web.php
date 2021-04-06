<?php
use App\Model\Admin\Product;
use App\Model\Admin\Category;
use App\Model\Admin\Subcategory;
// use Admin;
// use Hash;
Route::get('/sub', function () {
        // dd(Hash::make("udemy12345"));

        // $product=Product::where('status','1')->where('hot_deal','1')->orderBy('id','desc')->get();
        // foreach($product as $pro){
        //         // echo $pro->product_name;
        //         echo $pro->categories->category_name;
        //         // echo $pro->scategories->subcategory_name;
        //         // echo $pro->brand->brand_name;
        //         // echo "<br>";        
        // }
        // echo $sc;
        
        
        // foreach($pr as $pro){
        //         echo $pro;;
               
        // }
        // dd(auth:admin()->user()->id());

});
Route::get('/hash','HomeController@hash');

Route::get('/', function () {return view('pages.index');})->name('index');
//auth & user
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password-change', 'HomeController@changePassword')->name('password.change');
Route::post('/password-update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index')->name('admin.home');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update');
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['middleware'=>['category']],function(){
  //categories admin
        Route::get('admin/categories', 'Admin\Category\CategoryController@category')->name('categories');
        Route::post('admin/store/category', 'Admin\Category\CategoryController@storecategory')->name('add.category');
        Route::get('admin/delete/{id}/category', 'Admin\Category\CategoryController@deletecategory')->name('delete.category');
        Route::get('admin/edit/{id}/category', 'Admin\Category\CategoryController@editcategory')->name('edit.category');
        Route::post('admin/update/{id}/category', 'Admin\Category\CategoryController@updatecategory')->name('update.category');
        //brand
        Route::get('admin/brands', 'Admin\Category\BrandController@brand')->name('brands');
        Route::post('admin/store/brand', 'Admin\Category\BrandController@storebrand')->name('store.brand');
        Route::get('admin/delete/{id}/brand', 'Admin\Category\BrandController@deletebrand')->name('delete.brand');
        Route::get('admin/edit/{id}/brand', 'Admin\Category\BrandController@editbrand')->name('edit.brand');
        Route::post('admin/update/{id}/brand', 'Admin\Category\BrandController@updatebrand')->name('update.brand');
        //Sub Categories
        Route::get('admin/sub/category', 'Admin\Category\SubcategoryController@subcategory')->name('sub.category');
        Route::post('admin/store/sub/category', 'Admin\Category\SubcategoryController@storesubcategory')->name('store.subcategory');
        Route::get('admin/delete/{id}/sub/category', 'Admin\Category\SubcategoryController@deletesubcategory')->name('delete.subcategory');
        Route::get('admin/edit/{id}/sub/category', 'Admin\Category\SubcategoryController@editsubcategory')->name('edit.subcategory');
        Route::post('admin/update/{id}/sub/category', 'Admin\Category\SubcategoryController@updatesubcategory')->name('update.subcategory');

});

Route::group(['middleware'=>['coupon']],function(){
   //admin coupon
        Route::get('admin/coupon', 'Admin\Category\CouponController@coupon')->name('admin.coupon');
        Route::post('admin/store/coupon', 'Admin\Category\CouponController@storecoupon')->name('store.coupon');
        Route::get('admin/delete/{id}/coupon', 'Admin\Category\CouponController@deletecoupon')->name('delete.coupon');
        Route::get('admin/edit/{id}/coupon', 'Admin\Category\CouponController@editcoupon')->name('edit.coupon');
        Route::post('admin/update/{id}/coupon', 'Admin\Category\CouponController@updatecoupon')->name('update.coupon');
        
});



Route::group(['middleware'=>['product']],function(){
  //Product route
        Route::get('admin/product', 'Admin\ProductController@index')->name('admin.product');
        Route::get('admin/product/add', 'Admin\ProductController@create')->name('admin.product.create');
        Route::post('admin/product/store', 'Admin\ProductController@store')->name('store.product');
        Route::get('admin/product/inactive/{id}','Admin\ProductController@inactive')->name('product.inactive');
        Route::get('admin/product/active/{id}','Admin\ProductController@active')->name('product.active');
        Route::get('admin/product/delete/{id}', 'Admin\ProductController@delete')->name('delete.product');
        Route::get('admin/product/show/{id}','Admin\ProductController@show')->name('product.show');
        Route::get('admin/product/edit/{id}','Admin\ProductController@editproduct')->name('edit.product');
        Route::post('admin/product/update/data/{id}', 'Admin\ProductController@update')->name('update.product');
        Route::post('admin/product/update/image/{id}', 'Admin\ProductController@updateimage')->name('image.update.product');
        //show sub category with ajax
        Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');
      
});

Route::group(['middleware'=>['blog']],function(){
        //Blog Admin All
        Route::get('admin/blog/category/list', 'Admin\PostController@BlogCatList')->name('add.blog.categorylist');
        Route::post('admin/blog/category/store', 'Admin\PostController@storeCategory')->name('add.blog.category');
        Route::get('admin/blog/category/delete/{id}', 'Admin\PostController@deleteCategory')->name('delete.blog.category');
        Route::get('admin/blog/category/edit/{id}', 'Admin\PostController@editCategory')->name('edit.blog.category');
        Route::post('admin/blog/category/update/{id}', 'Admin\PostController@updateCategory')->name('update.blog.category');
        
        Route::get('admin/blog/post/create', 'Admin\PostController@createPost')->name('add.blog.post');
        Route::post('admin/blog/post/store', 'Admin\PostController@storePost')->name('store.blog.post');
        Route::get('admin/blog/post/list', 'Admin\PostController@blogPostList')->name('all.blog.post');
        Route::get('admin/blog/post/delete/{id}', 'Admin\PostController@deletePost')->name('blog.post.delete');
        Route::get('admin/blog/post/edit/{id}', 'Admin\PostController@editPost')->name('blog.post.edit');
        Route::post('admin/blog/post/update/{id}', 'Admin\PostController@updatePost')->name('update.blog.post');
        
        
});
Route::group(['middleware'=>['other']],function(){
        //Newsletter
        Route::get('admin/newsletter', 'Admin\Category\CouponController@newsletter')->name('admin.newsletter');
        
        Route::get('admin/delete/{id}/newsletter', 'Admin\Category\CouponController@deletenewsletter')->name('delete.newsletter');

        //SEO setting admin
        Route::get('Admin/seo', 'Admin\OrderController@seo')->name('admin.seo');
        Route::post('Admin/seo/update', 'Admin\OrderController@updateseo')->name('update.seo');
        

});



Route::group(['middleware'=>['order']],function(){
        //Admin Order
        Route::get('admin/pending/Orders', 'Admin\OrderController@neworder')->name('admin.neworder');
        Route::get('admin/view/Orders/{id}', 'Admin\OrderController@vieworder')->name('admin.view.order');
        Route::get('admin/Order/accept/{id}', 'Admin\OrderController@orderaccept')->name('payment.accept');
        Route::get('admin/Order/cancel/{id}', 'Admin\OrderController@ordercancel')->name('payment.cancel');
        Route::get('admin/Order/progress/{id}', 'Admin\OrderController@orderprogress')->name('payment.progress');
        Route::get('admin/Order/delevered/{id}', 'Admin\OrderController@orderdelevered')->name('payment.delevered');

        Route::get('admin/accept/list', 'Admin\OrderController@acceptpayment')->name('admin.accept.payment');
        Route::get('admin/delevery/list', 'Admin\OrderController@deleverypayment')->name('admin.delevery.payment');
        Route::get('admin/process/list', 'Admin\OrderController@processpayment')->name('admin.process.payment');
        Route::get('admin/cancel/list', 'Admin\OrderController@cancelpayment')->name('admin.cancel.payment');

});

Route::group(['middleware'=>['report']],function(){
        //Order Report Routes
        Route::get('admin/today/order', 'Admin\ReportController@todayOrder')->name('admin.today.order');
        Route::get('admin/today/delevery', 'Admin\ReportController@todayDelevery')->name('admin.today.delevery');
        Route::get('admin/this/month', 'Admin\ReportController@thismonth')->name('admin.this.month');
        Route::get('admin/search/report', 'Admin\ReportController@searchreport')->name('admin.search.report');
        
        Route::post('admin/search/report/date', 'Admin\ReportController@searchbydate')->name('search.by.date');
        Route::post('admin/search/report/month', 'Admin\ReportController@searchbymonth')->name('search.by.month');
        Route::post('admin/search/report/year', 'Admin\ReportController@searchbyyear')->name('search.by.year');
        
});


//Admin User Role
Route::group(['middleware'=>['user_role']],function(){
        Route::get('admin/all/user', 'Admin\UserRoleController@alluser')->name('admin.all.user');
        Route::get('admin/edit/{id}', 'Admin\UserRoleController@editAdmin')->name('edit.admin');
        Route::get('admin/delete/{id}', 'Admin\UserRoleController@deleteAdmin')->name('delete.admin');

        Route::get('admin/Create', 'Admin\UserRoleController@createAdmin')->name('create.admin');
        Route::post('admin/role/store', 'Admin\UserRoleController@storeRole')->name('admin.store.role');
        Route::post('admin/role/update/{id}', 'Admin\UserRoleController@updateRole')->name('admin.update.role');
});
Route::group(['middleware'=>['setting']],function(){
       
        //Admin Site Setting
        Route::get('admin/site/setting', 'Admin\SettingController@siteSetting')->name('admin.site.setting');
        Route::post('admin/update/site/setting/{id}', 'Admin\SettingController@updateSetting')->name('admin.update.setting');
});

Route::group(['middleware'=>['setting']],function(){
       //Admin Return 
        Route::get('admin/return/request', 'Admin\ReturnController@request')->name('admin.return.request');
        Route::get('admin/return/aprove/{id}', 'Admin\ReturnController@aprove')->name('admin.update.return');
        Route::get('admin/all/request', 'Admin\ReturnController@allRequest')->name('admin.all.request');
        
});


Route::group(['middleware'=>['contact']],function(){
      //Admin Contact
        Route::get('admin/all/messages', 'Admin\ContactController@allContact')->name('admin.all.contact');
        Route::get('admin/messages/read/{id}', 'Admin\ContactController@readed')->name('admin.message.read');
 
 });
//Admin Contact

Route::get('admin/all/messages', 'Admin\ContactController@allContact')->name('admin.all.contact');

// Admin Product Stock
        Route::get('admin/product/stock', 'Admin\UserRoleController@productStock')->name('admin.product.stock');

//frontend Wishlist
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist')->name('add.wishlist');

//Add to Cart
Route::get('add/to/cart/{id}', 'CartController@addCart')->name('add.cart');

Route::get('check', 'CartController@check')->name('check.cart');
Route::get('show/cart', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{id}', 'CartController@removeCart')->name('cart.remove');
Route::post('update/cart/item', 'CartController@updateCartItem')->name('update.cart.item');
Route::get('cart/product/view/{id}', 'CartController@viewmodalproduct');
Route::post('cart/product/insert', 'CartController@insertintocart')->name('insert.into.cart');
Route::get('cart/user/checkout', 'CartController@checkout')->name('user.checkout');
Route::get('cart/user/wishlist', 'CartController@wishlist')->name('user.wishlist');
Route::post('user/apply/coupon', 'CartController@coupon')->name('apply.coupon');
Route::get('user/remove/coupon', 'CartController@removecoupon')->name('remove.coupon');

//product Details
Route::get('product/detail/{id}', 'ProDetController@productDetails')->name('product.details');
Route::post('add/product/cart/{id}', 'ProDetController@addProductCart')->name('product.add.cart');

//Blog Post
Route::get('blog/post', 'BlogController@blog')->name('blog.post');
Route::get('blog/single/post/{id}', 'BlogController@singleblog')->name('blog.single.post');

//payment step
Route::get('payment/page', 'CartController@paymentpage')->name('payment.step');
Route::post('user/payment/process', 'PaymentController@payment')->name('payment.process');
Route::post('user/stripe/charge', 'PaymentController@stripeCharge')->name('stripe.charge');


//Produc Detail Page Subcategory
Route::get('product/page/{id}', 'ProDetController@productview')->name('pages.subcategories');
Route::get('product/page/category/{id}', 'ProDetController@productcategoryview')->name('pages.category');
Route::get('product/page/brand/{id}', 'ProDetController@productbrandview')->name('pages.brand');

//frontend Newsletter
Route::post('admin/store/newsletter', 'FrontController@storenewsletter')->name('store.newsletter');


//Order Tracking Frontend
Route::post('user/order/tracking', 'FrontController@tracking')->name('order.tracking');


//Reurn Order Route Front End

Route::get('success/order', 'PaymentController@successList')->name('success.order.list');
Route::get('return/request/{id}', 'PaymentController@returnRequest')->name('request.return');

//frontend contact
Route::get('Contact/us', 'FrontController@contact')->name('contact');
Route::post('Contact/send', 'FrontController@sendContact')->name('send.contact');

//Search Route
Route::post('product/search', 'FrontController@search')->name('product.search');


//Edit Prroofile FrontEnd
Route::get('edit/profile', 'FrontController@editProfile')->name('edit.profile');
Route::post('update/profile', 'FrontController@updateProfile')->name('profile.update');
Route::post('update/profile/image', 'FrontController@updateProfileImage')->name('update.profile.image');

//Product all
Route::get('all/products', 'FrontController@productAll')->name('product.all');
Route::get('all/products/price/filter', 'FrontController@productFilterPrice')->name('product.filter.price');

//Edit Admin Profile

Route::group(['middleware'=>['profile']],function(){
        Route::get('Admin/edit/profile/{id}', 'Admin\UserRoleController@editAdminProfile')->name('edit.admin.profile'); 
        Route::post('Admin/update/profile/{id}', 'Admin\UserRoleController@updateAdminProfile')->name('admin.update.profile'); 
});

//Laravel Socialite
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
 Route::get('/callback/{provider}', 'SocialController@callback');