@extends('layouts.dashboard_template')
@section('content')
<title>The Cheapest | Admin | Edit Category</title>  
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Admin Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Upate Category
           <a href="{{route('all.categories')}}" class="btn btn-success btn-sm pull-right">View all categories</a> 
          </h5>
          <p>Update Category</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Update Category</h6>
        
          <form action="{{url('admin/update/category/'.$category->id)}}" method="POST">
            @csrf
            <div class="form-layout">
             <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Category name </label>
                  <input class="form-control" type="text" name="category_name" placeholder="Update category name" value="{{$category->category_name}}">
                </div>
              </div><!-- col-4 -->
             </div>
             <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5" type="submit">Submit Form</button>
              </div><!-- form-layout-footer -->
            </div>
          </form>
        </div>
    </div>
</div>

    
@endsection