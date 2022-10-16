@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')


@if($product)
<div class="container mt-5 mb-5">
    <div class="row">

<div class="col-md-3">
   <div class="card">
    <a href="{{url('show-details')}}/{{$product->id}}">
       <img src="{{asset('uploads/Products/images')}}/{{$product->image}}" height="200px" class="w-100">
    <div class="card-body">
      <h5 class="card-title">{{$product->name}}</h5>
       <p class="card-text fw-5">{{$product->description}}</p>
        
           </div>
        </a>
       </div>

    </div>
   
</div>
    </div>





@else





<div class="container mt-5 mb-5">
<div class="row">
<div class="col-md-6">
    <div class="text-center">
<h1>Your search not found </h1>
</div>
</div>
</div>
</div>

@endif



@endsection