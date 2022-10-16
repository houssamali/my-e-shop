@extends('frontend.contentpage')
 @section('content')   
@include('frontend.layouts.navbar')

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Order No</th>
                                <th>Order Status</th>
                                <th>Order price</th>
                                <th>Order Date</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                              
                            <tr>
                                
                                <td>{{$order->name}}</td>
                                <td class="text-warning">Track-No:{{$order->track_no}}</td>
                                <td>@if($order->status==1)
                                {{'complete'}} 
                                @else
                                {{'pending'}}   
                                @endif</td>
                                <td class="text-warning">Rs: {{$order->total}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>
                                    
                                        
                                    <a href="{{url('view-order')}}/{{$order->id}}" class="btn btn-success">View Order</a>
                                    <a href="{{url('print_order')}}/{{$order->id}}" class="btn btn-primary">Print Order</a>
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

@section('scripts')
<script src="{{asset('assets/js/custom.js')}}"></script>
@endsection