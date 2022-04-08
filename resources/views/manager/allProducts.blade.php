  @extends('layouts.dashboard_template')
  @section('content')
  <title>The Cheapest | Manager | My Products</title>    

  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">


    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Products Table</h5>
        
      </div><!-- sl-page-title -->

      <div class="card pd-20 pd-sm-40">

        <h6 class="card-body-title">My Products
            <a href="{{route('manager.add.product')}}" class="btn btn-sm btn-primary" style="float: right;">Add new</a>
        </h6>
        

        <div class="table-wrapper">
          <table id="datatable1" class="table display responsive nowrap">
            <thead>
              <tr>
                <th class="wd-5p">Name</th>
                <th class="wd-5p">Brand</th>
                <th class="wd-5p">Category</th>
                <th class="wd-5p">Subategory</th>
                <th class="wd-5p">Store name</th>
                <th class="wd-5p">Image</th>
                <th class="wd-5p">Quantity</th>
                <th class="wd-5p">Price</th>
                <th class="wd-5p">Weight</th>
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
                    <a href="{{URL::to('manager/edit/product/'.$product->id)}}" class="btn btn-info btn-sm" title="Edit">
                    <i class="fa fa-edit"></i></a>

                    <a href="{{URL::to('manager/delete/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Delete" id="delete">
                        <i class="fa fa-trash"></i></a>

                      @if ($product->status == 1 )
                        <a href="{{URL::to('manager/deactivate/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Make Inactive"><i class="fa fa-thumbs-down"></i></a>  
                      @else
                      <a href="{{URL::to('manager/activate/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Make Active" ><i class="fa fa-thumbs-up"></i></a>  
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