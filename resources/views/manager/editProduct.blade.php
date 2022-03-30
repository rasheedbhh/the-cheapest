@extends('layouts.dashboard_template')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="{{asset('backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
<title>The Cheapest | Manager | Edit Product</title>
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Manager Section</span>
      <span class="breadcrumb-item active">Add Product</span>
    </nav>
<div class="sl-pagebody">
    <div class="sl-page-title">
      <h5>Create Product
        <a href="" class="btn btn-success btn-sm pull-right">View All Products</a>
      </h5>
      <p>Add a new product to your store</p>
    </div><!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
      <h6 class="card-body-title">Add a new Product</h6>
    
      <form action="{{route('manager.insert.product')}}" method="POST" enctype="multipart/form-data">
        @csrf
  
      <div class="form-layout">
        <div class="row mg-b-25">
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Product Name: </label>
              <input class="form-control" type="text" name="name"  placeholder="Enter product name" value="{{$product->name}}">
            </div>
          </div><!-- col-4 -->
      

        <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Brand name</label>
              <input class="form-control" type="text" name="brand"  placeholder="Enter brand name" value="{{$product->brand}}">
            </div>
          </div><!-- col-4 -->

              <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Quantity </label>
              <input class="form-control" type="text" name="quantity"  placeholder="Enter product quantity" value="{{$product->quantity}}">
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Price</label>
              <input class="form-control" type="text" name="price"  placeholder="Enter price" value="{{$product->price}}">
            </div>
          </div><!-- col-4 -->
          
          <div class="col-lg-4">
            <div class="form-group">
              <label class="form-control-label">Discount Price </label>
              <input class="form-control" type="text" name="discount_price"  placeholder="Enter discount" value="{{$product->discount_price}}">
            </div>
          </div><!-- col-4 -->


   
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Category (Current category: {{$product->category->category_name}})</label>
              <select class="form-control select2" data-placeholder="Choose category" name="category">
                <option label="Choose category"></option>    
               @foreach ($categories as $category)
               <option value="{{$category->id}}">
              {{$category->category_name}}</option>
               @endforeach
              </select>
            </div>
          </div><!-- col-4 -->

          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Subcategory (Current subcategory: {{$product->subcategory->name}})</label>
              <select class="form-control select2" data-placeholder="Choose subcategory" name="subcategory">
                
              </select>
            </div>
          </div><!-- col-4 -->


          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Weight: </label>
              <input class="form-control" type="text" name="weight"  placeholder="Enter product weight" value="{{$product->weight}}" >
            </div>
          </div><!-- col-8 -->
 
          <div class="col-lg-4">
            <div class="form-group mg-b-10-force">
              <input class="form-control" type="hidden" name="store_id" value="{{$store->id}}">
            </div>
          </div><!-- col-8 -->

          <div class="col-lg-12">
            <div class="form-group mg-b-10-force">
              <label class="form-control-label">Product details: </label>
              <textarea  class="form-control" id="summernote" type="text" name="description"  placeholder="Enter product details" id="" cols="30" rows="10" >{!!$product->description!!}</textarea>
            </div>
          </div><!-- col-8 -->


          <div class="col-lg-3 mb-5">
            <div class="form-group mg-b-10-force">
                <input type="hidden" name="old_image" value="{{$product->image}}">
              <label class="form-control-label">Current image</label>  
              <img src="{{asset($product->image)}}" alt="current product image">
              <label class="form-control-label">Image</label>
              <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" name="image" 
                onchange="readURL(this)">
                <span class="custom-file-control"></span>
                <img src="#" alt="" id="one">
              </label>
           
            </div>
          </div>
       
        </div><!-- form-layout -->   
        <div class="form-layout-footer mt-5">
            <button class="btn btn-info mg-r-5" type="submit">Update Product</button>
          </div><!-- form-layout-footer -->
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
  