@extends('layouts.dashboard_template')
<title>The Cheapest | Admin | Add Category</title>  
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Admin Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add new category
           <a href="{{route('all.categories')}}" class="btn btn-success btn-sm pull-right">View all categories</a> 
          </h5>
          <p>Add a new category</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add a new category</h6>
        
          <form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
             <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Category name </label>
                  <input class="form-control" type="text" name="category_name" placeholder="Enter category name">
                </div>
              </div><!-- col-6 -->
              <div class="col-lg-6 mt-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Profile Picture </label>
                  <label class="custom-file">
                    <input type="file" id="file" class="custom-file-input" name="image" 
                    onchange="readURL(this)">
                    <span class="custom-file-control"></span>
                    <img src="#" alt="" id="one" class="mt-5">
                  </label>
               
                </div>
              </div>
             </div>
             <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              </div><!-- form-layout-footer -->
            </div>
          </form>
        </div>
    </div>
</div>

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