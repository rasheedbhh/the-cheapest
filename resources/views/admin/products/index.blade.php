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
              {{-- <th class="wd-5p">Image</th> --}}
              <th class="wd-5p">Quantity</th>
              <th class="wd-5p">Price</th>
              <th class="wd-5p">Size</th>
              <th class="wd-5p">Status</th>
              <th class="wd-5p">Action</th>
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
              {{-- <td><img src="{{URL::to($product->image)}}" style="height:40px" alt="Image not shown"></td> --}}
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
            
                    @if ($product->status == 1 )
                      <a href="{{URL::to('admin/deactivate/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Make Inactive"><i class="fa fa-thumbs-down"></i></a>  
                    @else
                    <a href="{{URL::to('admin/activate/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Make Active" ><i class="fa fa-thumbs-up"></i></a>  
                    @endif

                    @if ($product->trending == 1 )
                    <a href="{{URL::to('admin/notTrending/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle trending on"><i class="fa fa-fire"></i></a>  
                    @else
                     <a href="{{URL::to('admin/trending/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle trending off" ><i class="fa fa-fire"></i></a>  
                    @endif

                    @if ($product->on_sale == 1 )
                    <a href="{{URL::to('admin/notOnSale/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Make on sale"><i class="fa fa-money"></i></a>  
                    @else
                    <a href="{{URL::to('admin/onSale/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Not on sale" ><i class="fa fa-money"></i></a>  
                    @endif

                    @if ($product->main_slider == 1 )
                    <a href="{{URL::to('admin/notMainSlider/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle main slider on"><i class="fa fa-star"></i></a>  
                    @else
                    <a href="{{URL::to('admin/mainSlider/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle main slider off" ><i class="fa fa-star"></i></a>  
                    @endif

                    @if ($product->mid_slider == 1 )
                    <a href="{{URL::to('admin/notMidSlider/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle mid slider on"><i class="fa fa-tasks"></i></a>  
                    @else
                    <a href="{{URL::to('admin/midSlider/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle mid slider off" ><i class="fa fa-tasks"></i></a>  
                    @endif

                

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