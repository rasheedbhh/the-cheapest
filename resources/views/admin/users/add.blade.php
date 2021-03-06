@extends('layouts.dashboard_template')

<title>The Cheapest | Admin | Add User</title>  
<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="{{asset('backend/lib/summernote/summernote-bs4.css')}}" rel="stylesheet">
@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Admin Section</span>
      <span class="breadcrumb-item active">Add User</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add new user
           <a href="{{route('all.users')}}" class="btn btn-success btn-sm pull-right">View All users</a> 
          </h5>
          <p>Add a new user</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add a new user</h6>
        
          <form action="{{route('store.user')}}" method="POST" enctype="multipart/form-data">
            @csrf
      
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Name </label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email</label>
                  <input class="form-control" type="text" name="email"  placeholder="Enter email" value="">
                </div>
              </div><!-- col-4 -->
                <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Phone number</label>
                  <input class="form-control" type="text" name="phone_number"  placeholder="Enter phone number">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Password</label>
                  <input class="form-control" type="password" name="password"  placeholder="Enter password" value="">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Role</label>
                  <select class="form-control select2" data-placeholder="Choose role" name="role_id">
                    <option label="Choose Role"></option>
                    <option label="Admin" value="1"></option>
                    <option label="Store Manager" value="2"></option>
                    <option label="User" value="3"></option>
                  </select>
                </div>
              </div><!-- col-4 -->
            </div>  

            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </div><!-- card -->
      </form>
  </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

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
 $('select[name="category_id"]').on('change',function(){
      var category_id = $(this).val();
      if (category_id) {
        
        $.ajax({
          url: "{{ url('/get/subcategory/') }}/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data) { 
          var d =$('select[name="subcategory_id"]').empty();
          $.each(data, function(key, value){
          
          $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

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


<script type="text/javascript">
  function readURL2(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#two')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script type="text/javascript">
  function readURL3(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#three')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

<script type="text/javascript">
  function readURL4(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#four')
        .attr('src', e.target.result)
        .width(100)
        .height(100);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection
