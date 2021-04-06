@extends('layouts.app')
@section('content')
<?php
use App\Model\Order;
// use Auth;
$user_id=auth()->id();
    $order=Order::where('user_id',$user_id)->get();
    // dd($order);
?>


<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Return</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order as $row)
                        <tr>
                            <td scope="col">{{$row->payment_type}}</td>
                            <td scope="col">
                                        @if($row->return_order==0)
                                        <span class="badge badge-warning">No Request</span>

                                        @elseif($row->return_order==1)
                                        <span class="badge badge-info">Pending</span>

                                        @elseif($row->return_order==2)
                                        <span class="badge badge-success">Success</span>
                                        
                                        

                                        @endif
                            </td>
                            <td scope="col">${{$row->total}}</td>
                            <td>
                                        @if($row->status==0)
                                        <span class="badge badge-warning">Pending</span>

                                        @elseif($row->status==1)
                                        <span class="badge badge-info">Payment Accept</span>

                                        @elseif($row->status==2)
                                        <span class="badge badge-warning">Progress</span>
                                        
                                        @elseif($row->status==3)
                                        <span class="badge badge-success">Delevered</span>
                                        @elseif($row->status==5)
                                        <span class="badge badge-danger">Cancel</span>

                                        @endif
                            </td>
                            
                            <td scope="col">{{$row->date}}</td>
                            <td>
                                        @if($row->return_order==0)
                                        <a href="{{route('request.return',$row->id)}}" class="btn btn-sm btn-danger" id="return">Return</a></td>


                                        @elseif($row->return_order==1)
                                        <span class="badge badge-info">Pending</span>

                                        @elseif($row->return_order==2)
                                        <span class="badge badge-success">Success</span>
                                        
                                        

                                        @endif
                            
                        </tr>
                    @endforeach
                        
                    </tbody>
                    
                </table>
                
            </div>
            <div class="col-4">
                <div class="card">
                
                    <img src="{{asset('public/frontend/images/logo.png')}}" alt="" class="card-image-top" style="height:90px;width:90px;margin-left:34%;">
                    <div class="card-body">
                        <h4 class="card-title text-center">{{Auth::user()->name}}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('password.change')}}">Change Password</a></li>
                        <li class="list-group-item"><a href="">Edit Profile</a></li>
                        <li class="list-group-item"><a href="{{route('success.order.list')}}">Return Order</a></li>

                    </ul>
                    <div class="card-body">
                        <a href="{{route('user.logout')}}" class="btn btn-sm btn-block btn-danger">Logout</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection