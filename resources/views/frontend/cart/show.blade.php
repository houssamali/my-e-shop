@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')
<div class="container mt-5">
    @php $total=0; @endphp
@foreach($carts as $cart)
    <div class="row cart-data">
   
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-body">
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><img src="{{asset('uploads/products/images')}}/{{$cart->product->image}}" width="100px"></td>
                            <td>{{$cart->product->name}}</td>
                            <td>${{$cart->price}}</td>
                           
                            <td>
         <div class="input-group text-center" style="width:150px;">
            
            <input type="hidden" value="{{$cart->product->over_price}}" class="over_price">
            <input type="hidden" name="" value="{{$cart->prod_id}}" class="prod_id">
            <button type="button" class="input-group-text text changeQuantity decrement-btn">-</button>
            <input type="text" value="{{$cart->qty}}" class="form-control bg-light text-center  prod_qty">
            <button type="button" class="input-group-text changeQuantity increament-btn">+</button>
        </div> 

                            </td>




                            <td><a href="{{url('delete-cart')}}/{{$cart->id}}" class="btn btn-danger">Delete</a></td>
                        @php  $total +=$cart->price * $cart->qty @endphp
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
        </div>
       
    </div>
    @endforeach
</div>


<div class="container mt-3 mb-3">
<div class="card">
<div class="card-body">

    <div class="row ">
    
           
        <div class="col-md-8"><h6>Total:Rs<span class="bg-warning price-color fs-5 fw-5">{{$total}}</span></h6></div>
        <div class="col-md-4">
            <form action="{{url('checkout')}}" method="POST">
                @csrf
                
                <input type="hidden" name="user_id" value={{Auth::id()}}>
            <button type="submit" class="btn btn-primary">Check Out</button>
</form>
        </div>
    </div>
         
    </div>
        </div>
</div>
@endsection 

@section('scripts')
<script src="{{asset('assets/js/custom.js')}}"></script>
@endsection