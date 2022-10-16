<?php

namespace App\Http\Controllers\backend;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function showorder()
    {
    $orders=Order::all();
    return view('backend.order.show',compact('orders'));
    }

    public function conformorder($id)
    {
        $order=Order::find($id);
        if($order->status==0)
        {
        $order->status='1';
        }else{
            $order->status='0'; 
        }
        $order->update();

        return redirect()->back()->with('status','Order Has Been Conform');
    }
    public function deleteorder($id)
    {
        $order=Order::find($id);
        $order->delete();
        return redirect()->back()->with('status','Order Has Been Deleted Successfully');
    }
}
