@extends('backend.layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary" href="{{url('add-product')}}"> Add New Product</a></div>


                <div class="card-body">

                <table class="table table-striped text-center">
  <thead>
    
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">Name</th>
      <th scope="col"> price</th>
      <th scope="col">Over Price</th>
      <th scope="col">Tax</th>
      <th scope="col">Status</th>
      <th scope="col">Trending</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
      
    </tr>
   
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->over_price}}</td>
      <td>{{$product->tax}}</td>
      <td>{{$product->status}}</td>
      <td>{{$product->trending}}</td>
     
      <td><img src="{{asset('uploads/products/images')}}/{{$product->image}}" height="50px"></td>
      <td>
        <a href="{{url('delete-product')}}/{{$product->id}}" class="btn btn-danger">Delete</a>
        <a href="{{url('edit-product')}}/{{$product->id}}" class="btn btn-primary">Edit</a>
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