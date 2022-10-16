<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        if(Auth::id()==$request->user_id)
        {
           $carts=Cart::where('user_id',$request->user_id)->get();
           return view('frontend.check.checkout',compact('carts'));
           
        }
    }

    
}
