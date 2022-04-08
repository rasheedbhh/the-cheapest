@extends('layouts.dashboard_template')
<title>The Cheapest | Manager | Home</title>
@section('content')

    @if ($store != NULL)
        <div class="sl-mainpanel"> 
          <div class="sl-pagebody">

            <div class="row row-sm">
              <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-primary">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total products</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$products->count()}}</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Quantity in stock </span>
                      <h6 class="tx-white mg-b-0">{{number_format($products->sum('quantity'))}} products</h6>
                    </div>
                    <div>
                  
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card pd-20 bg-info">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">My orders</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$orders->count()}}</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                     
                      <h6 class="tx-white mg-b-0"> {{number_format($orders->sum('total_price'))}} L.L</h6>
                    </div>
                    <div>
                   
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-purple">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">
                      {{number_format($monthly_orders->sum('quantity'))}}  
                    </h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0"> {{number_format($monthly_orders->sum('total_price'))}}  </h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-sl-primary">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold"> {{number_format($yearly_orders->sum('quantity'))}}  </h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0"> {{number_format($yearly_orders->sum('total_price'))}} 
                          </h6>
                    </div>
                 
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
            </div><!-- row -->
    

    
          </div><!-- sl-pagebody -->
        </div>
    @else
  <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Manager Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          


        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Insert your store information</h6>
        
          <form action="{{route('manager.insert.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Name </label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter store name">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone number</label>
                  <input class="form-control" type="text" name="phone_number"  placeholder="Enter phone number">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Enter store address">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6 mt-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Profile Picture </label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="profile_picture" 
                    onchange="readURL(this)">
                    <span class="custom-file-control"></span>
                    <img src="#" alt="" id="one" class="mt-5">
                  </label>
               
                </div>
              </div>
            </div>  

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Add Store</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
      </form>
  </div><!-- sl-mainpanel -->
</div>
  <!-- ########## END: MAIN PANEL ########## -->   
@endif
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
  <script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
  <script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>

  <script type="text/javascript">
    function readURL(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
  </script>
@endsection

