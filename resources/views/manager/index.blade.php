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
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0">$2,210</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Tax Return</span>
                      <h6 class="tx-white mg-b-0">$320</h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card pd-20 bg-info">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0">$2,210</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Tax Return</span>
                      <h6 class="tx-white mg-b-0">$320</h6>
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
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0">$2,210</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Tax Return</span>
                      <h6 class="tx-white mg-b-0">$320</h6>
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
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0">$2,210</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Tax Return</span>
                      <h6 class="tx-white mg-b-0">$320</h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
            </div><!-- row -->
    
            <div class="row row-sm mg-t-20">
              <div class="col-xl-8">
                <div class="card overflow-hidden">
                  <div class="card-header bg-transparent pd-y-20 d-sm-flex align-items-center justify-content-between">
                    <div class="mg-b-20 mg-sm-b-0">
                      <h6 class="card-title mg-b-5 tx-13 tx-uppercase tx-bold tx-spacing-1">Profile Statistics</h6>
                      <span class="d-block tx-12">October 23, 2017</span>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="#" class="btn btn-secondary tx-12 active">Today</a>
                      <a href="#" class="btn btn-secondary tx-12">This Week</a>
                      <a href="#" class="btn btn-secondary tx-12">This Month</a>
                    </div>
                  </div><!-- card-header -->
                  <div class="card-body pd-0 bd-color-gray-lighter">
                    <div class="row no-gutters tx-center">
                      <div class="col-12 col-sm-4 pd-y-20 tx-left">
                        <p class="pd-l-20 tx-12 lh-8 mg-b-0">Note: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula...</p>
                      </div><!-- col-4 -->
                      <div class="col-6 col-sm-2 pd-y-20">
                        <h4 class="tx-inverse tx-lato tx-bold mg-b-5">6,112</h4>
                        <p class="tx-11 mg-b-0 tx-uppercase">Views</p>
                      </div><!-- col-2 -->
                      <div class="col-6 col-sm-2 pd-y-20 bd-l">
                        <h4 class="tx-inverse tx-lato tx-bold mg-b-5">102</h4>
                        <p class="tx-11 mg-b-0 tx-uppercase">Likes</p>
                      </div><!-- col-2 -->
                      <div class="col-6 col-sm-2 pd-y-20 bd-l">
                        <h4 class="tx-inverse tx-lato tx-bold mg-b-5">343</h4>
                        <p class="tx-11 mg-b-0 tx-uppercase">Comments</p>
                      </div><!-- col-2 -->
                      <div class="col-6 col-sm-2 pd-y-20 bd-l">
                        <h4 class="tx-inverse tx-lato tx-bold mg-b-5">960</h4>
                        <p class="tx-11 mg-b-0 tx-uppercase">Shares</p>
                      </div><!-- col-2 -->
                    </div><!-- row -->
                  </div><!-- card-body -->
                  <div class="card-body pd-0">
                    <div id="rickshaw2" class="wd-100p ht-200"></div>
                  </div><!-- card-body -->
                </div><!-- card -->
    
                <div class="card pd-20 pd-sm-25 mg-t-20">
                  <h6 class="card-body-title tx-13">Horizontal Bar Chart</h6>
                  <p class="mg-b-20 mg-sm-b-30">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p>
                  <canvas id="chartBar4" height="300"></canvas>
                </div><!-- card -->
    
              </div><!-- col-8 -->
              <div class="col-xl-4 mg-t-20 mg-xl-t-0">
    
                <div class="card pd-20 pd-sm-25">
                  <h6 class="card-body-title">Pie Chart</h6>
                  <p class="mg-b-20 mg-sm-b-30">Labels can be hidden if the slice is less than a given percentage of the pie.</p>
                  <div id="flotPie2" class="ht-200 ht-sm-250"></div>
                </div><!-- card -->
    
                <div class="card widget-messages mg-t-20">
                  <div class="card-header">
                    <span>Messages</span>
                    <a href=""><i class="icon ion-more"></i></a>
                  </div><!-- card-header -->
                  <div class="list-group list-group-flush">
                    <a href="" class="list-group-item list-group-item-action media">
                      <img src="../img/img10.jpg" alt="">
                      <div class="media-body">
                        <div class="msg-top">
                          <span>Mienard B. Lumaad</span>
                          <span>4:09am</span>
                        </div>
                        <p class="msg-summary">Many desktop publishing packages and web page editors now use...</p>
                      </div><!-- media-body -->
                    </a><!-- list-group-item -->
                    <a href="" class="list-group-item list-group-item-action media">
                      <img src="../img/img9.jpg" alt="">
                      <div class="media-body">
                        <div class="msg-top">
                          <span>Isidore Dilao</span>
                          <span>Yesterday 3:00am</span>
                        </div>
                        <p class="msg-summary">On the other hand, we denounce with righteous indignation and dislike...</p>
                      </div><!-- media-body -->
                    </a><!-- list-group-item -->
                    <a href="" class="list-group-item list-group-item-action media">
                      <img src="../img/img8.jpg" alt="">
                      <div class="media-body">
                        <div class="msg-top">
                          <span>Kirby Avendula</span>
                          <span>Yesterday 3:00am</span>
                        </div>
                        <p class="msg-summary">It is a long established fact that a reader will be distracted by the readable...</p>
                      </div><!-- media-body -->
                    </a><!-- list-group-item -->
                    <a href="" class="list-group-item list-group-item-action media">
                      <img src="../img/img7.jpg" alt="">
                      <div class="media-body">
                        <div class="msg-top">
                          <span>Roven Galeon</span>
                          <span>Yesterday 3:00am</span>
                        </div>
                        <p class="msg-summary">Than the fact that climate change may be causing it to rapidly disappear... </p>
                      </div><!-- media-body -->
                    </a><!-- list-group-item -->
                  </div><!-- list-group -->
                  <div class="card-footer">
                    <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a>
                  </div><!-- card-footer -->
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

