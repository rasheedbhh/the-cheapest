@extends('layouts.dashboard_template')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>All subcategories</h5>
              
            </div><!-- sl-page-title -->
      
            <div class="card pd-20 pd-sm-40">
      
              <h6 class="card-body-title">Product subcategories
                  <a href="{{route('add.user')}}" class="btn btn-sm btn-warning" style="float: right;" >Add new subcategory</a>
              </h6>
              
      
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Subcategory name</th>
                        <th class="wd-15p">Category name</th>
                        <th class="wd-15p">Actions</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $key=>$subcategory )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$subcategory->name}}</td>
                                <td>{{$subcategory->category->category_name}}</td>
                                <td>    
                                    <a href="{{url('admin/edit/subcategory/'.$subcategory->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{url('admin/delete/subcategory'.$subcategory->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
@endsection