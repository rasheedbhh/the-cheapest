@extends('layouts.dashboard_template')
@section('content')
<title>The Cheapest | My wishlist</title>  
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">


    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>My wishlist</h5>
        
      </div><!-- sl-page-title -->
  
      <div class="card pd-20 pd-sm-40">
  
        <h6 class="card-body-title">All Products</h6>
        
  
        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">Name</th>
                <th class="wd-5p">Brand</th>
                <th class="wd-5p">Category</th>
                <th class="wd-5p">Subcategory</th>
                <th class="wd-5p">Store name</th>
                <th class="wd-5p">Image</th>
                <th class="wd-5p">Price</th>
                <th class="wd-5p">Size</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($orders as $key=>$order)
              <tr>
                <td>{{$order->product->name}}</td>
                <td>{{$order->product->brand}}</td>
                <td>{{$order->product->category->category_name}}</td>
                <td>{{$order->product->subcategory->name}}</td>
                <td>{{$order->product->store->name}}</td>
                <td><img src="{{asset($order->product->image)}}" style="height:40px" alt="Image not shown"></td>
                <td>{{number_format($order->total_price)}}L.L</td>
                <td>{{$order->product->weight}}</td>
              </tr>
              @endforeach
             
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div><!-- card -->
    </div>
  </div>
  
  
  <!-- ########## END: MAIN PANEL ########## -->
@endsection