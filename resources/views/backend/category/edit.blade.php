@extends('backend.layouts.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

        <div class="card">
        
           <div class="card-header "><div class="bg-light text-dark text-center">Add New Category</div></div>
          
        <div class="card-body">
        
        <form action="{{url('update-category')}}/{{$categories->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" value="{{$categories->name}}" class="form-control bg-light w-50" >
  @error('name')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="text" name="description" value="{{$categories->description}}" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @error('description')
<div class="bg-white w-50">{{$message}}</div>
  @enderror

</div>


  <div class="mb-3 w-50 d-flex justify-content-between">


   <div>
    <label for="exampleInputPassword1" class="form-label">Status</label>
    <input type="checkbox" name="status" value="1" {{$categories->status==true?'checked':''}}  id="exampleInputPassword1">
    </div>

    <div>
    <label for="exampleInputPassword1" class="form-label">Trending</label>
    <input type="checkbox" name="trending" value="1"  {{$categories->trending==true?'checked':''}} id="exampleInputPassword1">
    </div>


    <div>
    <label for="exampleInputPassword1" class="form-label">public</label>
    <input type="checkbox" name="public" value="1" {{$categories->public==true?'checked':''}}  id="exampleInputPassword1">
    </div>


</div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <img src="{{asset('uploads/images')}}/{{$categories->image}}" height="50px">
    @if($categories->image)
    <input type="file" name="image" class="form-control bg-light  w-50" id="exampleInputPassword1">
    @endif
    @error('image')
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