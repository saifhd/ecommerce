@extends('admin.admin_layouts')

@section('admin_content')
<div class="sl-mainpanel">
      

    <div class="sl-pagebody">
        <div class="sl-page-title">
       
          <h5>Search Report</h5>
          
        </div>
    
        <div class="row">
        
            <div class="col-lg-4">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title"></h6>
                    
                    
                    <div class="table-wrapper">
                    

                            <form action="{{route('search.by.date')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label id="" for="categoryName">Search By Date</label>
                                    <input type="date" class="form-control" value="" id="categoryName" name="date">
                                </div>   
                                
                        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Search</button>
                                    
                                </div>
                            </form> 
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>


            <div class="col-lg-4 ">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title"></h6>
                    
                    
                    <div class="table-wrapper">
                    

                            <form action="{{route('search.by.month')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label id="" for="categoryName">Search By Month</label>
                                    <select name="month" id="" class="form-control">
                                        <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                    </select>
                                </div>   
                                
                        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Search</button>
                                    
                                </div>
                            </form> 
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>


            <div class="col-lg-4">
                <div class="card pd-20 pd-sm-40">
                    <h6 class="card-body-title"></h6>
                    
                    
                    <div class="table-wrapper">
                    

                            <form action="{{route('search.by.year')}}" method="post">
                            @csrf
                                <div class="form-group">
                                    <label id="" for="categoryName"> Search By Year</label>
                                    <select name="year" id="" class="form-control">
                                    @for($i = 2000; $i <= 2100; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                    </select>
                                </div>   
                                
                        
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Search</button>
                                    
                                </div>
                            </form> 
                    </div><!-- table-wrapper -->
                </div><!-- card -->
            </div>
        </div>
        
        
    </div>
</div>
<!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

   
          
@endsection