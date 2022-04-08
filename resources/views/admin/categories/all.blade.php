@extends('layouts.dashboard_template')
<title>The Cheapest | Admin | All Categories</title>  
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>All categories</h5>
              
            </div><!-- sl-page-title -->
      
            <div class="card pd-20 pd-sm-40">
      
              <h6 class="card-body-title">Product categories
                  <a href="{{route('add.category')}}" class="btn btn-sm btn-warning" style="float: right;" >Add new category</a>
              </h6>
              
      
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Category Name</th>
                        <th class="wd-15p">Category Image</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-15p">Actions</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key=>$category )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>
                                    @if ($category->image !=NULL)
                                        <img src="{{asset($category->image)}}" alt="" style="width: 50px;">
                                    @else
                                        <p>Category has no image</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->popular ==1)
                                    <span class="badge badge-success">Popular</span> 
                                    @else
                                    <span class="badge badge-danger">Not popular</span>   
                                    @endif 
                                    </td> 
                                </td>
                                <td>    
                                    <a href="{{url('admin/edit/category/'.$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    @if ($category->popular == 0)
                                          <a href="{{url('admin/popular/'.$category->id)}}" class="btn btn-info btn-sm">Popular
                                          </a>
                                    @else
                                         <a href="{{url('admin/notpopular/'.$category->id)}}" class="btn btn-danger btn-sm" title="not popular">
                                         Unpopular   
                                         </a>  
                                    @endif
                                  
                                    <a href="{{url('admin/delete/category/'.$category->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
@endsection