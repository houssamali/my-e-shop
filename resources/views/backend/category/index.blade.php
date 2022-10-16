@extends('backend.layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary"  href="{{url('add-category')}}"> Add New Category</a></div>



                <div class="card-body">

                <table class="table table-striped text-center">
  <thead>
    
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Category Name</th>
      <th scope="col">Status</th>
      <th scope="col">Trending</th>
      <th scope="col">Public</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
   
  </thead>
  <tbody>
  @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category->id}}</th>
      <td>{{$category->name}}</td>
      <td>{{$category->status}}</td>
      <td>{{$category->trending}}</td>
      <td>{{$category->public}}</td>
      <td><img src="{{asset('uploads/images')}}/{{$category->image}}" height="50px"></td>
      <td>
        <a href="{{url('delete-category')}}/{{$category->id}}" class="btn btn-danger">Delete</a>
        <a href="{{url('edit-category')}}/{{$category->id}}" class="btn btn-primary">Edit</a>
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