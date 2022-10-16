@extends('backend.layouts.index')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary"  href="{{ route('register') }}"> Add New User</a></div>



                <div class="card-body">

                <table class="table table-striped text-center">
  <thead>
    
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role_as</th>
      <th scope="col">Rigester Date</th>
      <th>Action</th>
    </tr>
   
  </thead>
  <tbody>
  @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->role_as}}</td>
      <td>{{$user->created_at}}</td>
     <td>
        <a href="{{url('delete-user')}}/{{$user->id}}" class="btn btn-danger">Delete</a>
        <a href="{{url('edit-user')}}/{{$user->id}}" class="btn btn-primary">Edit</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                </div>


            </div>
        </div>
    </div>
</div>







@endsection