@extends('layouts.dashboard_template')
<title>The Cheapest | Admin | All Users</title>  
@section('content')
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>All Roles</h5>
              
            </div><!-- sl-page-title -->
      
            <div class="card pd-20 pd-sm-40">
      
              <h6 class="card-body-title">User Roles
                  <a href="{{route('add.user')}}" class="btn btn-sm btn-warning" style="float: right;" >Add new user</a>
              </h6>
              
      
              <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                        <th class="wd-15p">Number</th>
                        <th class="wd-15p">Name</th>
                        <th class="wd-15p">Email</th>
                        <th class="wd-15p">Phone</th>
                        <th class="wd-15p">Role</th>
                        <th class="wd-15p">Created At</th>
                        <th class="wd-20p">Action</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$user )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone_number}}</td>
                                <td> 
                                @if ($user->role_id == 1)
                                <span class="badge btn-danger">Admin</span>
                                @elseif ($user->role_id == 2)
                                <span class="badge btn-warning">Manager</span>
                                @else
                                <span class="badge btn-success">User</span>
                                @endif
                                </td>
                                <td>
                                    <p >{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</p>
                                </td>
                                <td>    
                                    <a href="{{url('admin/edit/user/'.$user->id)}}" class="btn btn-info btn-sm">Edit</a>
                                    <a href="{{url('admin/delete/update/'.$user->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                
                                </td>
                               
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>
</div>
@endsection