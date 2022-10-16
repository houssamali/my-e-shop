@extends('backend.layouts.index')

@section('content')






<div class="wrap-circles">
  <div class="circle per-0">
    <div class="inner">%{{$user}}</div>
  </div>
  <div class="circle per-25">
    <div class="inner">%{{$order}}</div>
  </div>
  <div class="circle per-50">
    <div class="inner">%{{$product}}</div>
  </div>
  <div class="circle per-75">
    <div class="inner">{{$category}}</div>
  </div>
  <div class="circle per-100">
    <div class="inner">100%</div>
  </div>
</div>






@endsection



