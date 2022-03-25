@extends('layouts.dashboard_template')
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>All Stores</h5>
              
            </div><!-- sl-page-title -->
      
            <div class="card pd-20 pd-sm-40">
      
              <h6 class="card-body-title">Stores
                  <a href="{{route('add.store')}}" class="btn btn-sm btn-warning" style="float: right;" >
                    Add new store</a>
              </h6>
              
      
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Manager</th>
                        <th class="wd-15p">Address</th>
                        <th class="wd-15p">Created At</th>
                        <th class="wd-20p">Action</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $key=>$store )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->phone_number}}</td>
                                <td>{{$store->manager->name}}</td>
                                <td>{{$store->address}}</td>
                                <td>
                                    <p >{{ \Carbon\Carbon::parse($store->created_at)->diffForHumans()}}</p>
                                </td>
                                <td>    
                                    <a href="{{url('admin/edit/store/'.$store->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{url('admin/delete/store/'.$store->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                
                                </td>
                               
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
@endsection