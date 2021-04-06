@extends('layouts.app')

@section('content')
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-5 offset-lg-1">
                <div class="contact_form_title"><h4>Your Order Status</h4></div>
                <div class="progress">
                @if($track->status==0)
                    <div class="progress-bar bg-danger" role="progressbar" style="width:15%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                @elseif($track->status==1)
                    <div class="progress-bar bg-danger" role="progressbar" style="width:15%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-primary" role="progressbar" style="width:30%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                @elseif($track->status==2)
                    <div class="progress-bar bg-danger" role="progressbar" style="width:15%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-primary" role="progressbar" style="width:30%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-info" role="progressbar" style="width:20%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                @elseif($track->status==3)
                    <div class="progress-bar bg-danger" role="progressbar" style="width:15%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-primary" role="progressbar" style="width:30%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-info" role="progressbar" style="width:20%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                    <div class="progress-bar bg-success" role="progressbar" style="width:35%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                @else
                    <div class="progress-bar bg-danger" role="progressbar" style="width:100%;" area-valuenow="15" 
                    area-valuemin="0" area-valuemax="100"></div>
                @endif
                </div>
                <br>
                @if($track->status==0)
                    <h4>Note: Your Order Are Under Review</h4>
                @elseif($track->status==1)
                    <h4>Note: Your Payment Accept Under Process</h4>
                @elseif($track->status==2)
                    <h4>Note: Packing Done Hand Over Process</h4>
                @elseif($track->status==3)
                    <h4>Note: Order Complete</h4>
                @else
                    <h4>Note: Order Cancel</h4>

                @endif
            </div>
            <div class="col-5 offset-lg-1">
                <div class="contact_form_title"><h4>Your Order Details</h4></div>
                <ul class="col-lg-12 list-group">
                    <li class="list-group-item">Payment Type: <span style="float:right;">{{$track->payment_type}}</span></li>
                    <li class="list-group-item">Transaction ID: <span style="float:right;">{{$track->payment_id}}</span> </li>
                    <li class="list-group-item">Balance ID: <span style="float:right;">{{$track->balance_transection}}</span></li>
                    <li class="list-group-item">Subtotal: <span style="float:right;">${{$track->subtotal}}</span></li>
                    <li class="list-group-item">Shipping: <span style="float:right;">${{$track->shipping}}</span></li>
                    <li class="list-group-item">Vat:({{$track->vat}}%) <span style="float:right;">${{$track->subtotal * $track->vat/100}}</span></li>
                    <li class="list-group-item">Total: <span style="float:right;">${{$track->total}}</span></li>
                    <li class="list-group-item">Month: <span style="float:right;">{{$track->month}}</span></li>
                    <li class="list-group-item">Date: <span style="float:right;">{{$track->date}}</span></li>
                    <li class="list-group-item">Year: <span style="float:right;">{{$track->year}}</span></li>
                </ul>

               
            </div>

        </div>
    </div>
</div>



@endsection