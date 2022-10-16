@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')

<div class="card m-1">
    <div class="card-body">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-success text-center"> collections/{{$categories->name}}</div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">

 <div class="owl-carousel featured-carousel owl-theme">   

@foreach($products as $product)

<div class="item">
   <div class="card">
    <a href="{{url('show-details')}}/{{$product->id}}">
       <img src="{{asset('uploads/products/images')}}/{{$product->image}}" height="200px" class="w-100">
    <div class="card-body">
      <h5 class="card-title text-dark">{{$product->name}}</h5>
      <p class="text-secondary">{{$product->small_description}}</p>
       <p class="card-text  price-color float-start fw-5">{{$product->price}}</p>
       <span class="float-end"><s>{{$product->over_price}}</s></span>
        
           </div>
        </a>
       </div>

    </div>
    @endforeach
</div>
    </div>
</div>

</div>
</div>


<div class="card m-1">
    <div class="card-body">

    

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-info text-center">Public Products</div>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">

 <div class="owl-carousel featured-carousel owl-theme">   

@foreach($public as $product)

<div class="item">
   <div class="card">
    <a href="{{url('show-details')}}/{{$product->id}}">
       <img src="{{asset('uploads/products/images')}}/{{$product->image}}" height="200px" class="w-100">
    <div class="card-body">
      <h5 class="card-title text-dark">{{$product->name}}</h5>
      <p class="text-secondary">{{$product->small_description}}</p>
       <p class="card-text  price-color float-start fw-5">{{$product->price}}</p>
       <span class="float-end"><s>{{$product->over_price}}</s></span>
        
           </div>
        </a>
       </div>

    </div>
    @endforeach
</div>






    </div>
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
