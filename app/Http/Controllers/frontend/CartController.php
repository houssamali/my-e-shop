<?php

namespace App\Http\Controllers\frontend;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function addtocart(Request $request)
    {
           $prod_id=$request->product_id;
           $qty=$request->product_qty;
           $over_price=$request->over_price;

        if(Auth::check())
        {
            $cartcheck=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
            if($cartcheck)
            {
                return response()->json(['status'=>$cartcheck->product->name.' product Already exists']);
            }else{
                $cart=new Cart();
                $cart->prod_id=$prod_id;
                $cart->qty=$qty;
                $cart->price=$over_price;
                $cart->user_id=Auth::id();
                $cart->save();

                return response()->json(['status'=>$cart->product->name.' product has been added to cart']);
            }
           
        }else
        {
            return back('frontend.index')->with('status','please login first');
        }
     
    }



    public function showcart()
    {
       

        $carts=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart.show',compact('carts'));
        
    }


   

   
    public function deletecart($id)
    {
     $cart=Cart::find($id);
     
     $cart->delete();
     return redirect('show-cart')->with('status',$cart->product->name.' Has Been Delete Successfully');
    }
    
    public function updatecart(Request $request)
    {
        $prod=$request->prod_id;
        $qty=$request->prod_qty;
        $cart=Cart::where('prod_id',$prod)->where('user_id',Auth::id())->first();
        if($cart)
        {
            $cart->qty=$qty;
            $cart->update();
        }
    

    }
    

}
