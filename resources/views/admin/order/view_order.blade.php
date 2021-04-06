@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order Details</h6>



            <div class="row">
                <div class="col-md-6">
                <br><br><br><br>
                    <div class="card">
                        <div class="card-header"><strong>Order</strong> Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>{{$order->user->name}}</th>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <th>{{$order->shippingDet->ship_phone}}</th>
                                    
                                </tr>
                                
                                <tr>
                                    <th>Payment Type</th>
                                    <th>{{$order->payment_type}}</th>
                                </tr>
                                <tr>
                                    <th>Payment ID</th>
                                    <th>{{$order->payment_id}}</th>
                                </tr>
                                <tr>
                                    <th>Order ID</th>
                                    <th>{{$order->stripe_order_id}}</th>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <th>${{$order->total}}</th>
                                </tr>
                                <tr>
                                    <th>Month</th>
                                    <th>{{$order->month}}</th>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <th>{{$order->date}}</th>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                <br><br><br><br>
                    <div class="card">
                        <div class="card-header"><strong>Shipping</strong> Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <th>{{$order->user->name}}</th>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <th>{{$order->shippingDet->ship_phone}}</th>
                                    
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <th>{{$order->shippingDet->ship_email}}</th>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <th>{{$order->shippingDet->ship_address}}</th>
                                </tr>

                                <tr>
                                    <th>City</th>
                                    <th>{{$order->shippingDet->ship_city}}</th>
                                </tr>
                               
                                <tr>
                                    <th>Status</th>
                                    <th>
                                        @if($order->status==0)
                                        <span class="badge badge-warning">Pending</span>

                                        @elseif($order->status==1)
                                        <span class="badge badge-info">Payment Accept</span>

                                        @elseif($order->status==2)
                                        <span class="badge badge-warning">Progress</span>
                                        
                                        @elseif($order->status==3)
                                        <span class="badge badge-success">Delevered</span>
                                        @else
                                        <span class="badge badge-danger">Cancel</span>

                                        @endif
                                    
                                    </th>
                                </tr>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="card pd-20 pd-sm-40 col-lg-12">
                <h6 class="card-body-title">Product Details</h6>
                
                
                <div class="table-wrapper">
                    <table class="table display responsive nowrap">
                    <thead>
                        <tr>
                        <th class="wd-15p">Product Id</th>
                        <th class="wd-15p">Product Name</th>
                        <th class="wd-15p">Image</th>
                        <th class="wd-15p">Color</th>
                        <th class="wd-15p">Size</th>
                        <th class="wd-15p">Quantity</th>
                        <th class="wd-15p">Unit Price</th>
                        <th class="wd-20p">Total Price</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderdetails as $pro)
                        <tr>
                        <td>{{$pro->product->product_code}}</td>
                        <td>{{$pro->product_name}}</td>
                        
                        <td>
                        @if($pro->product->image_one)
                            <img src="{{URL::to($pro->product->image_one)}}" height="50px" width="50px" alt="">
                        @endif
                        </td>
                        <td>{{$pro->product_color}}</td>
                        <td>{{$pro->product_size}}</td>
                        <td>{{$pro->quantity}}</td>
                        <td>${{$pro->single_price}}</td>
                        
                        <td>${{$pro->total_price}} </td>
                        
                        </tr>
                        

                        @endforeach
                        
                        
                    </tbody>
                    </table>
                </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
            @if($order->status==0)
            <a href="{{route('payment.accept',$order->id)}}" class="btn btn-info">Payment Accept</a>
            <br>
            <a href="{{route('payment.cancel',$order->id)}}" class="btn btn-danger">Order Cancel</a>
            
            @elseif($order->status==1)
            <a href="{{route('payment.progress',$order->id)}}" class="btn btn-info">Process Delevery</a>
            
            @elseif($order->status==2)
            <a href="{{route('payment.delevered',$order->id)}}" class="btn btn-success">Delevery Done</a>
            @elseif($order->status==5)
            <strong class="text-warning text-center">This Products are Cancelled Successfully</strong>
            @else
            <strong class="text-success text-center">This Products are Delevered Successfully</strong>
            
            @endif
        </div>
    </div>
</div>
@endsection