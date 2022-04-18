@extends('layouts.dashboard_template')
@section('content')
<title>The Cheapest | Admin | Store requests</title>  
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>All Stores</h5>
              
            </div><!-- sl-page-title -->
      
            <div class="card pd-20 pd-sm-40">
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Manager</th>
                        <th class="wd-15p">Address</th>
                        <th class="wd-15p">Legal Document</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-15p">Created At</th>
                        <th class="wd-20p">Action</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($stores as $key=>$store)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$store->name}}</td>
                                <td>{{$store->phone_number}}</td>
                                <td>{{$store->manager->name}}</td>
                                <td>{{$store->address}}</td>
                                <td> <img src="{{asset($store->profile_picture)}}" alt="Legal proof" width="150px;"> </td>
                                <td><span class="badge badge-danger">Pending</span> </td>
                                <td>
                                    <p >{{ \Carbon\Carbon::parse($store->created_at)->diffForHumans()}}</p>
                                </td>
                                <td>    
                                    <a href="{{url('admin/accept/request/'.$store->id)}}" class="btn btn-success btn-sm" title="Accept request">Accept</a>
                                    <a href="{{url('admin/decline/request/'.$store->id)}}" class="btn btn-danger btn-sm" title="Decline request">Decline</a>
                
                                </td>
                               
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
@endsection