@extends('layouts.dashboard_template')
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="index.html">The Cheapest</a>
      <span class="breadcrumb-item active">Admin Section</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add new subcategory
           <a href="{{route('all.subcategories')}}" class="btn btn-success btn-sm pull-right">View all subcategories</a> 
          </h5>
          <p>Add a new subcategory</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add a new subcategory</h6>
        
          <form action="{{route('store.subcategory')}}" method="POST">
            @csrf
            <div class="form-layout">
             <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Subcategory name </label>
                  <input class="form-control" type="text" name="subcategory_name" placeholder="Enter subcategory name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category</label>
                  <select class="form-control select2" data-placeholder="Choose category" name="category">
                    <option label="Choose Category"></option>
                   @foreach ($categories as $category)
                   <option value="{{$category->id}}">
                  {{$category->category_name}}
                    </option>
                   @endforeach
                  </select>
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