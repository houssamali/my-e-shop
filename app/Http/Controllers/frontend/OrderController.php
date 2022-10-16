<?php

namespace App\Http\Controllers\frontend;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ItemOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
//use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class OrderController extends Controller
{
    public function addorder(Request $request)
    {
        if(Auth::id())
        {
            
           
            $carts=Cart::where('user_id',Auth::id())->exists();
            if(!empty($carts))
            {
      
        $order=new Order();
        $order->user_id=Auth::id();
        $order->name=$request->name;
        $order->email=$request->email;
        $order->address=$request->address;
        $order->total=$request->total;
        $order->phone=$request->phone;
        $order->pincode=$request->pincode;
        $order->track_no=rand(11111,99999);
        $order->save();
        
        $carts=Cart::where('user_id',Auth::id())->get();
            foreach($carts as $cart)
            {
                $itemorder=new ItemOrder();
                $itemorder->user_id=Auth::id();
                $itemorder->prod_id=$cart->prod_id;
                $itemorder->order_id=$order->id;
                $itemorder->qty=$cart->qty;
                $itemorder->price=$cart->price;
                $itemorder->save();
            }
            $cartdelete=Cart::where('user_id',Auth::id())->first();
            $cartdelete->delete();
          
        
    
    return redirect('show-order')->with('status','Order Has Been Added',compact('itemorder'));
    }

    else{
        return redirect('show-cart')->with('status2','Your Cart is Empty');
    }
    
    
    }
}

    public function showorder()
    {
        $orders=Order::where('user_id',Auth::id())->get();
        return view('frontend.order',compact('orders'));
    }


    public function vieworder($id)
    { 
        //$order_id=ItemOrder::where('order_id',$id)->get();
        /*foreach($items as $item)
        {
            echo $item->prod_id;
        }*/
       
         $items=ItemOrder::where('user_id',Auth::id())->where('order_id',$id)->get();
        $orders=Order::where('user_id',Auth::id())->where('id',$id)->first();

        return view('frontend.view',compact('items','orders'));
    }

    public function print_pdf($id)
    {
        $orders=Order::find($id);
        $items=ItemOrder::where('order_id',$orders->id)->get();
        

        
   $pdf=PDF::loadView('backend.pdf',compact('orders','items'));
   return $pdf->download('order_details.pdf');
    }


    public function print_order($id)
    {
        
        
        $orders=Order::find($id);
        $items=ItemOrder::where('order_id',$orders->id)->where('user_id',Auth::id())->get();
       
        $pdf=PDF::LoadView('frontend.download',compact('orders','items'));
        return $pdf->download('My_Orders.pdf');

        
    }
}
