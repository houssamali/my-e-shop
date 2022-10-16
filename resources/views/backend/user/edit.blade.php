@extends('backend.layouts.index')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="card">
        
           <div class="card-header "><div class="bg-light text-dark text-center">Update Update</div></div>
          
        <div class="card-body">
        
        <form action="{{url('/update-user')}}/{{$user->id}}" method="post">
            @csrf
            @method('PUT')


    



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">User Name</label>
    <input type="text" name="name" value="{{$user->name}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('name')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">User Email</label>
    <input type="text" name="email" value="{{$user->email}}" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @error('small_description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Role_as</label>
    <input type="text" name="role_as" value="{{$user->role_as}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('name')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

  
  <div>
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>



        </div>
    </div>
</div>
</div>
</div></div>
@endsection