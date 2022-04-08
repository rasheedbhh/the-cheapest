@extends('layouts.dashboard_template')
<title>The Cheapest | Admin | Home</title>
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">

            <div class="row row-sm">
              <div class="col-sm-6 col-xl-3">
                <div class="card pd-20 bg-primary">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Products</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$products->count()}}</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Product categories</span>
                      <h6 class="tx-white mg-b-0">{{$categories->count()}}</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Product subcategories</span>
                      <h6 class="tx-white mg-b-0">{{$subcategories->count()}}</h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="card pd-20 bg-info">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Stores</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$stores->count()}}</h3>
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
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Users</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$users->count()}}</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div> 
                      @php
                        $admins = DB::table('users')->where('role_id',1)->get();
                        $managers = DB::table('users')->where('role_id',2)->get();
                        $customers = DB::table('users')->where('role_id',3)->get();
                     @endphp
                      <span class="tx-11 tx-white-6">Admins</span>
                      <h6 class="tx-white mg-b-0">{{$admins->count()}}</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Store managers</span>
                      <h6 class="tx-white mg-b-0">{{$managers->count()}}</h6>
                    </div>
                    <div>
                      <span class="tx-11 tx-white-6">Customers</span>
                      <h6 class="tx-white mg-b-0">{{$customers->count()}}</h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
              <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="card pd-20 bg-sl-primary">
                  <div class="d-flex justify-content-between align-items-center mg-b-10">
                    <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Orders</h6>
                    <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
                  </div><!-- card-header -->
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="sparkline2">5,3,9,6,5,9,7,3,5,2</span>
                    <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$orders->count()}}</h3>
                  </div><!-- card-body -->
                  <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
                    <div>
                      <span class="tx-11 tx-white-6">Gross Sales</span>
                      <h6 class="tx-white mg-b-0">
                        @php
                          $sum = DB::table('orders')->sum('total_price');
                        @endphp
                        {{number_format($sum)}} L.L</h6>
                    </div>
                  </div><!-- -->
                </div><!-- card -->
              </div><!-- col-3 -->
            </div><!-- row -->
    

    
          </div><!-- sl-pagebody -->
    </div>
@endsection