@extends('backend.layouts.index')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a class="btn btn-primary"  href="{{ route('register') }}"> Add New User</a></div>



                <div class="card-body">

                <table class="table table-striped text-center">
  <thead>
    
    <tr>
      <th scope="col">#Id</th>
      <th scope="col">User_Id</th>
      <th scope="col">Status</th>
      <th scope="col">Order_No</th>
      <th scope="col">Total_Price</th>
      <th>Action</th>
    </tr>
   
  </thead>
  <tbody>
  @foreach($orders as $order)
    <tr class="text-primary">
      <td scope="row">{{$order->id}}</td>
      <td>{{$order->user_id}}</td>
      <td>{{$order->status==1?'Completed':'Pending'}}</td>
      <td>Tr_no: {{$order->track_no}}</td>
      <td>${{$order->total}}</td>
     <td>
        <a href="{{url('delete-request')}}/{{$order->id}}" class="btn btn-danger">Delete</a>
        <a href="{{url('conform-request')}}/{{$order->id}}" class="btn btn-primary">conform</a>
        <a href="{{url('print_pdf')}}/{{$order->id}}" class="btn btn-primary">Print Pdf</a>
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