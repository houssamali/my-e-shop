@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')





<!---update rating start-->
<div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="updatemodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updatemodalLabel">Rating {{$product->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="{{url('add-rating')}}" method="post">
    @csrf
      <div class="modal-body">


      
<input type="hidden" name="prod_id" value="{{$product->id}}">
<div class="rating-css">
    <div class="star-icon">
        <input type="radio" value="1" name="product_rating" checked id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating" id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
    </div>
</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"> Rating</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!---end updat rating model--->

 







<div class="container mt-5">

<!-- start first row-->
    <div class="row">
        <div class="col-md-12 bg-info">
            <h4 class="text-center">Collections/{{$category->name}}/{{$product->name}}</h4>
        </div>
    </div>
</div>




<div class="container">

<div class="card m-1">
    <div class="card-body">

<!-- start first row-->
   
<div class="row mt-4 float-end">
     <div class="col-md-3 trending-public">
            
        @if($product->trending=='1')
           <div class=" text-center"><h6 class="bg-trending text-center">Trending</h6></div>
           @elseif($product->public=='1')
           <div class=" "><h6 class="bg-trending text-center">Public</h6></div>
           @else
           <div class=" "><h6 class=" text-center"></h6></div>
           @endif
    </div>
</div>
<!-- end first row-->


<!-- start second row-->
    <div class="row cart-data">
        
        <div class="col-md-6">
            <img src="{{asset('uploads/products/images')}}/{{$product->image}}" class="w-100">

            <p>{{$product->long_description}}</p>
        </div>



        <div class="col-md-6">
        <div class="card"></div>
        <div class="card-body">

            <!---start first inner row--->

            <div class="row mt-5">
           <div class="col-md-6">
            <h6>{{$product->name}}</h6>
               
           
                <span class="float-start">PRICE : Rs: <s>{{$product->price}}</s></span>
                <span class="offer-price">Offer: Rs:{{$product->over_price}}</span>

                <p>{{$product->small_description}}</p>
               
                
                @php $count= $ratingtotal;  @endphp
                @if($ratings !='0')
                <button type="button" class="rating-button-ramove" data-bs-toggle="modal" data-bs-target="#updatemodal">
                <div class="rating-css">
                   <div class="star-icon d-flex mb-3">
               
                  @for($i=1; $i<=$count;$i++)
                  <input type="radio" value="{{$i}}" name="product_rating" checked id="{{$i}}">
                     <label for="{{$i}}" class="fa fa-star"></label>
                     @endfor
                     
                     @for($j=$count + 1; $j<=5;$j++)
                     <input type="radio" value="{{$j}}" name="product_rating"  id="{{$j}}">
                     <label for="{{$j}}" class="fa fa-star"></label>
                    
                     @endfor
                     <h5 class="text-dark mx-1">{{($ev)}}</h5>
                   
                     </div>
                    </div>
                    </button>

                       @else
     <button type="button" class="rating-button-ramove" data-bs-toggle="modal"
       data-bs-target="#updatemodal">

<div class="rating-css">
    <div class="star-icon d-flex mb-3">
    
        <input type="radio" value="1" name="product_rating" checked  id="rating1">
        <label for="rating1" class="fa fa-star"></label>
        <input type="radio" value="2" name="product_rating"  id="rating2">
        <label for="rating2" class="fa fa-star"></label>
        <input type="radio" value="3" name="product_rating" id="rating3">
        <label for="rating3" class="fa fa-star"></label>
        <input type="radio" value="4" name="product_rating" id="rating4">
        <label for="rating4" class="fa fa-star"></label>
        <input type="radio" value="5" name="product_rating" id="rating5">
        <label for="rating5" class="fa fa-star"></label>
        <h5 class="text-dark mx-1">{{$ev}}</h5>
        </div>
</div>
</button>
                
@endif

                    </div>
            

<div class="col-md-6">

<div>
      
  @if($product->status=='1')
            <span class="bg-info w-25 bg-stock">In stock</span>
            @else
            <span class="bg-info w-25 bg-stock">Out Of stock</span>
            @endif
</div>
   
</div></div></div>
<div class="row">
    <div class="col-md-6">

    
            
            <div class="input-group text-center" style="width:150px;">
            
                <input type="hidden" value="{{$product->over_price}}" class="over_price">
                <input type="hidden" name="" value="{{$product->id}}" class="prod_id">
                <button type="button" class="input-group-text   decrement-btn">-</button>
                <input type="text" value="1" class="form-control bg-light text-center  prod_qty">
                <button type="button" class="input-group-text increament-btn">+</button>
            </div>
            <div class="mt-2">
                <button type="button" class="btn btn-primary cart-mergin addToCart">
                    Add To Cart <i class="fa fa-shopping-cart"></i></button>
                <button type="button" class="btn btn-secondary AddToWishlis">
                     <i class="fa fa-heart"></i></button>
            </div>
           </div>



           </div>
</div>
           



</div>

</div>
</div>
</div>
</div>










@endsection


@section('scripts')

<script src="{{asset('assets/js/custom.js')}}"></script>

@endsection