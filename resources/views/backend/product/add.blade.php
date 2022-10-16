@extends('backend.layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="card">
        
           <div class="card-header "><div class="bg-light text-dark text-center">Add New Product</div></div>
          
        <div class="card-body">
        
        <form action="{{url('/insert-product')}}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
  <select name="cate_id" class="form-select form-select-lg bg-light w-50" aria-label=".form-select-lg example">
  <option selected>Select Category Name</option>
  @foreach($categories as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
  
</select>

   
 
</div>

        
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('name')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">small Description</label>
    <input type="text" name="small_description" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @error('small_description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">long description</label>
    <input type="text" name="long_description" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('long_description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Price</label>
    <input type="text" name="price" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('price')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Over Price</label>
    <input type="text" name="over_price" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('over_price')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input type="text" name="qty" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('qty')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Tax</label>
    <input type="text" name="tax" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('tax')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


  


  <div class="mb-3 w-50 d-flex justify-content-between">


   <div>
    <label for="exampleInputPassword1" class="form-label">Status</label>
    <input type="checkbox" name="status" value="1"  id="exampleInputPassword1">
    </div>

    <div>
    <label for="exampleInputPassword1" class="form-label">Trending</label>
    <input type="checkbox" name="trending" value="1"  id="exampleInputPassword1">
    </div>


    <div>
    <label for="exampleInputPassword1" class="form-label">public</label>
    <input type="checkbox" name="public" value="1"  id="exampleInputPassword1">
    </div>


</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file" name="image" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @error('image')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>


  
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>



        </div>
    </div>
</div>
</div>
</div></div>
@endsection