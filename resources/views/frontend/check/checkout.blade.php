@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')



<div class="container mt-5 mb-5">
    <div class="card">
        <div class="cart-body">

      
    <div class="row m-1">

    <div class="col-md-6">
    <div class="card">
        <div class="cart-body">
          <form action="{{url('add-order')}}" method="POST">
            @csrf
          
        <div class="row m-1">


   <div class="col-md-6">
            
  <div class="mb-3">
    <label  class="form-label">User Name</label>
    <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" >
  </div>
</div>

<div class="col-md-6">
  <div class="mb-3">
    <label  class="form-label">User Email ID</label>
    <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" >
  </div>
    </div>

    <div class="col-md-6">
    <div class="mb-3">
    <label  class="form-label">User Address</label>
    <input type="text" name="address" class="form-control" required >
    
  </div>
</div>

<div class="col-md-6">
<div class="mb-3">
    <label  class="form-label">Contact Number</label>
    <input type="text" name="phone" class="form-control"  required>
  </div>
</div>


<div class="col-md-6">
<div class="mb-3">
    <label  class="form-label">Pincode</label>
    <input type="text" name="pincode" class="form-control"  required>
  </div>
</div>


        </div>
       
    </div>

    </div>
</div>



    <div class="col-md-6">
    <div class="card">
        <div class="cart-body">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product name</th>
                <th>product qty</th>
                <th>product price</th>
            </tr>
            <tbody>
            @php $total=0; @endphp
            @foreach($carts as $cart)
            <tr>
                <td><img src="{{asset('uploads/products/images')}}/{{$cart->product->image}}" width="50px"></td>
                <td>{{$cart->product->name}}</td>
                <td>{{$cart->qty}}</td>
                <td>{{$cart->price}}</td>
                @php  $total +=$cart->price * $cart->qty   @endphp
            </tr>
            @endforeach
            </tbody>
        </thead>
    </table>
    <div><h1>Total:Rs: {{$total}}</h1>
    <input type="hidden" name="total" value="{{$total}}">
    
    <div class="text-center mt-1"><button type="submit" class="btn btn-secondary w-50  ">Order</button></div>
    
</form>

<form action="{{url('payment')}}" method="POST">
      @csrf 
      <input type="hidden" name="amount" value="1.0">
      <div class="text-center mt-2"><button type="submit" class="btn btn-success w-50">PayPal</button></div>
    </form>
  </div>
    </div>

    </div>
</div>
        
    </div>
</div>
</div>
    </div>
@endsection