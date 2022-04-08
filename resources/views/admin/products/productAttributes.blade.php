@extends('layouts.dashboard_template')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="{{asset('backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
<title>The Cheapest | Admin | Edit Attributes</title>
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Admin Section</span>
      <span class="breadcrumb-item active">Product attributes</span>
    </nav>
<div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Edit product attributes</h6>
    
      <form action="{{route('manager.insert.product')}}" method="POST" enctype="multipart/form-data">
        @csrf
  
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Product Name: </label>
              <p>{{$product->name}}</p>
            </div>
          </div><!-- col-4 -->
      

        <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Brand name</label>
              <p>{{$product->brand}}</p>
            </div>
          </div><!-- col-4 -->

              <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Quantity </label>
             <p>{{$product->quantity}}</p>
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Price</label>
              <p>{{$product->price}} </p>
            </div>
          </div><!-- col-4 -->
          
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Discount Price </label>
           <p>{{$product->discount_price}} </p>  
            </div>
          </div><!-- col-4 -->


   
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="form-control-label">Category Name: </label>
              <p>{{$product->category->category_name}}</p>
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
                <label class="form-control-label">Subcategory Name: </label>
            <p> {{$product->subcategory->name}}</p>  
            </div>
          </div><!-- col-4 -->


          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Weight: </label>
              <p> {{$product->weight}}</p>
             
            </div>
          </div><!-- col-8 -->
          <div class="col-lg-12">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Product details: </label>
              <p>{!!$product->description!!}</p>
            </div>
          </div><!-- col-8 -->


          <div class="col-lg-3 mb-5">
            <div class="form-group mg-b-10-force">
                <input type="hidden" name="old_image" value="{{$product->image}}">
              <label class="form-control-label">Image</label>  
              <img src="{{asset($product->image)}}" alt="current product image">
              </label>
            </div>
          </div>

          <div class="col-lg-12 mb-5">
            <label class="form-control-label">Attributes</label>  <br>
            @if ($product->status ==1)
            <span class="badge badge-success">Active</span> 
            @else
            <span class="badge badge-danger">Inactive</span>   
            @endif 
            @if ($product->trending ==1)
            <span class="badge badge-success">Trending</span> 
            @else
            <span class="badge badge-danger">Not Trending</span>   
            @endif 
            @if ($product->on_sale ==1)
            <span class="badge badge-success">On sale</span> 
            @else
            <span class="badge badge-danger">Not on sale</span>   
            @endif 
            @if ($product->best_seller ==1)
            <span class="badge badge-success">Best seller</span> 
            @else
            <span class="badge badge-danger">Not best seller</span>   
            @endif 
            @if ($product->mid_slider ==1)
            <span class="badge badge-success">On mid slider</span> 
            @else
            <span class="badge badge-danger">Not on mid slider</span>   
            @endif 
            @if ($product->weekly_deals ==1)
            <span class="badge badge-success">Deals of the week</span> 
            @else
            <span class="badge badge-danger">Not on deals of the week</span>   
            @endif 
          </div>

          <div class="col-lg-12 mb-5">
            <label class="form-control-label">Toggle attributes on/off </label>
            <br>  
            @if ($product->status == 1 )
            <a href="{{URL::to('admin/deactivate/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Make Inactive"><i class="fa fa-thumbs-down"></i></a>  
          @else
          <a href="{{URL::to('admin/activate/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Make Active" ><i class="fa fa-thumbs-up"></i></a>  
          @endif

          @if ($product->trending == 1 )
          <a href="{{URL::to('admin/notTrending/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle trending off"><i class="fa fa-fire"></i></a>  
          @else
           <a href="{{URL::to('admin/trending/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle trending on" ><i class="fa fa-fire"></i></a>  
          @endif

          @if ($product->on_sale == 1 )
          <a href="{{URL::to('admin/notOnSale/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Make not sale"><i class="fa fa-money"></i></a>  
          @else
          <a href="{{URL::to('admin/onSale/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="on sale" ><i class="fa fa-money"></i></a>  
          @endif

          @if ($product->best_seller == 1 )
          <a href="{{URL::to('admin/not_best_seller/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle main slider off"><i class="fa fa-star"></i></a>  
          @else
          <a href="{{URL::to('admin/best_seller/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle main slider on" ><i class="fa fa-star"></i></a>  
          @endif

          @if ($product->mid_slider == 1 )
          <a href="{{URL::to('admin/notMidSlider/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle mid slider off"><i class="fa fa-tasks"></i></a>  
          @else
          <a href="{{URL::to('admin/midSlider/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle mid slider on" ><i class="fa fa-tasks"></i></a>  
          @endif

          @if ($product->weekly_deals == 1 )
          <a href="{{URL::to('admin/notweekly/product/'.$product->id)}}" class="btn btn-danger btn-sm" title="Toggle main deal of the week off"><i class="fa fa-star"></i></a>  
          @else
          <a href="{{URL::to('admin/weekly/product/'.$product->id)}}" class="btn btn-primary btn-sm" title="Toggle main deals of the week on" ><i class="fa fa-star"></i></a>  
          @endif
      
          </div>
       
        </div><!-- form-layout -->   
      </div>
    </div><!-- card -->
  </form>
</div><!-- sl-mainpanel -->
</div>
</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="{{asset('backend/lib/medium-editor/medium-editor.js')}}"></script>
<script src="{{asset('backend/lib/summernote/summernote-bs4.min.js')}}"></script>


<script>
  $(function(){
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
 $('select[name="category"]').on('change',function(){
      var category_id = $(this).val();
      if (category_id) {
        
        $.ajax({
          url: "{{ url('manager/get/subcategory/') }}/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data) { 
          var d =$('select[name="subcategory"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="subcategory"]').append('<option value="'+ value.id + '">' + value.name + '</option>');

          });
          },
        });

      }else{
        alert('danger');
      }

        });
  });

</script> 

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
  