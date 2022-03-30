@extends('layouts.dashboard_template')
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="{{asset('backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
<title>The Cheapest | Edit | Store</title>
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Manager Section</span>
      <span class="breadcrumb-item active">Update Store</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Update store 
          </h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update your store information</h6>
        
          <form action="{{route('manager.update.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Store name </label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter store name" value="{{$store->name}}">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone number</label>
                  <input class="form-control" type="text" name="phone_number"  placeholder="Enter phone number" value="{{$store->phone_number}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Address</label>
                  <input class="form-control" type="text" name="address" placeholder="Enter store address" value="{{$store->address}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6 mt-4">
                <div class="form-group mg-b-10-force">
                  <label for=""> Current profile picture: </label>
                  <img src="{{asset($store->profile_picture)}}" alt="store profile picture" style="width: 50px;border-radius:50%; margin-left:10px; margin-bottom: 25px;"> 
                  <br>
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
              <button class="btn btn-info mg-r-5" type="submit">Update my store</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
      </form>
  </div><!-- sl-mainpanel -->
</div>
  <!-- ########## END: MAIN PANEL ########## -->  
@endsection
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