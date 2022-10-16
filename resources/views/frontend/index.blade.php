@extends('frontend.contentpage')

 @section('content') 
 
@include('frontend.layouts.navbar')

@include('frontend.layouts.slide')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center ">All Category</h1>
        </div>
    </div>
</div>


<div class="container mt-3">
    <div class="row">

 <div class="owl-carousel featured-carousel owl-theme">   
@foreach($categories as $category)
<div class="item">
   <div class="card">
    <a href="{{url('show-category')}}/{{$category->id}}">
       <img src="{{asset('uploads/images')}}/{{$category->image}}" height="200px" class="w-100">
    <div class="card-body">
      <h5 class="card-title">{{$category->name}}</h5>
       <p class="card-text fw-5">{{$category->description}}</p>
        
           </div>
        </a>
       </div>

    </div>
    @endforeach
</div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center ">Trending Products</h1>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">

 <div class="owl-carousel featured-carousel owl-theme">   
@foreach($products as $product)
<div class="item">
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
    @endforeach
</div>
    </div>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center ">Public Products</h1>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row">

 <div class="owl-carousel featured-carousel owl-theme">   
@foreach($public as $product)
<div class="item">
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
    @endforeach
</div>
    </div>
</div>


@endsection


@section('scripts')
<script>

$('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }

    }
}) 
</script>
@endsection



