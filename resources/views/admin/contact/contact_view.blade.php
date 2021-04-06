@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
<div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Message</h5>
          
        </div><!-- sl-page-title -->

        

        <div class="card pd-20 pd-sm-40 mg-t-25">
          <h6 class="card-body-title">Contact Details</h6>
          

          <dl class="row">
            <dt class="col-sm-3 tx-inverse">Name</dt>
            <dd class="col-sm-9">{{$contact->name}}</dd>

            <dt class="col-sm-3 tx-inverse">Phone</dt>
            <dd class="col-sm-9">
              <p class="mg-b-10">{{$contact->phone}}</p>
              
            </dd>

            <dt class="col-sm-3 tx-inverse">Email</dt>
            <dd class="col-sm-9"><a href="mailto:{{($contact->email)}}">{{($contact->email)}}</a></dd>

            <dt class="col-sm-3 text-truncate tx-inverse">Message</dt>
            <dd class="col-sm-9">{{$contact->message}}</dd>

            
          </dl>
        </div><!-- card -->

      </div>
      <!-- sl-pagebody -->
</div>
      

@endsection