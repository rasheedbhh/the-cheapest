@extends('layouts.dashboard_template')
@section('content')
<title>The Cheapest | Admin | All Products</title>  

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">


  <div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Products Table</h5>
      
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
              <th class="wd-5p">Quantity</th>
              <th class="wd-5p">Price</th>
              <th class="wd-5p">Weight</th>
              <th class="wd-5p">Status</th>
            
              <th class="wd-5p">Attributes</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($products as $key=>$product)
            <tr>
              <td>{{$product->name}}</td>
              <td>{{$product->brand}}</td>
              <td>{{$product->category->category_name}}</td>
              <td>{{$product->subcategory->name}}</td>
              <td>{{$product->store->name}}</td>
              <td><img src="{{URL::to($product->image)}}" style="height:40px" alt="Image not shown"></td>
              <td>{{$product->quantity}}</td> 
              <td>{{$product->price}}L.L</td>
              <td>{{$product->weight}}</td>

              <td>  
              @if ($product->status ==1)
              <span class="badge badge-success">Active</span> 
              @else
              <span class="badge badge-danger">Inactive</span>   
              @endif 
              </td>
         
               <td>    
            
                  <a class="btn btn-info btn-sm" href="{{url('admin/get/product/'.$product->id)}}">Edit</a>

              </td>
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