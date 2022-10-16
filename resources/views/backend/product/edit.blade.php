@extends('backend.layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="card">
        
           <div class="card-header "><div class="bg-light text-dark text-center">Update Product</div></div>
          
        <div class="card-body">
        
        <form action="{{url('/update-product')}}/{{$product->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')


    <div class="mb-3">
  <select name="cate_id" class="form-select form-select-lg bg-light w-50" aria-label=".form-select-lg example">  
  <option value="{{$category->id}}">{{$category->name}}</option>
</select>
</div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Name</label>
    <input type="text" name="name" value="{{$product->name}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('name')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">small Description</label>
    <input type="text" name="small_description" value="{{$product->small_description}}" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @error('small_description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">long description</label>
    <input type="text" name="long_description" value="{{$product->long_description}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('long_description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Price</label>
    <input type="text" name="price" value="{{$product->price}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('price')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Over Price</label>
    <input type="text" name="over_price"  value="{{$product->over_price}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('over_price')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Quantity</label>
    <input type="text" name="qty" value="{{$product->qty}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('qty')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Product Tax</label>
    <input type="text" name="tax" value="{{$product->tax}}" class="form-control bg-light w-50" id="exampleInputPassword1">
  @error('tax')
<div class="bg-white w-50">{{$message}}</div>
  @enderror
</div>


  


  <div class="mb-3 w-50 d-flex justify-content-between">


   <div>
    <label for="exampleInputPassword1" class="form-label">Status</label>
    <input type="checkbox" name="status" value="1" {{$product->status==1?'checked':''}}  id="exampleInputPassword1">
    </div>

    <div>
    <label for="exampleInputPassword1" class="form-label">Trending</label>
    <input type="checkbox" name="trending" value="1"  {{$product->trending==1?'checked':''}} id="exampleInputPassword1">
    </div>


    <div>
    <label for="exampleInputPassword1" class="form-label">public</label>
    <input type="checkbox" name="public" value="1" {{$product->public==1?'checked':''}}  id="exampleInputPassword1">
    </div>


</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <img src="{{asset('uploads/products/images')}}/{{$product->image}}" width="50px">
    @if($product->image)
    <input type="file" name="image" class="form-control bg-light  w-50" id="exampleInputPassword1">
   @endif

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