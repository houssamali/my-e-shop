<?php

namespace App\Http\Controllers\frontend;
use App\Models\Wishlist;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class WishlistController extends Controller
{

public function showwishlist()
{
    $wishlists=Wishlist::where('user_id',Auth::id())->get();
    return view('frontend.wishlist.show',compact('wishlists'));
}

    public function addtwishlist(Request $request)
    {
        $prod_id=$request->prod_id;
        $prod_qty=$request->prod_qty;
        if(Auth::check())
        {
            
            $checkwishlist=Wishlist::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
          if($checkwishlist)
          {
            return response()->json(['status'=>$checkwishlist->product->name.' Wishlist already exists']);
          }else{
            $wishlist=new Wishlist();
            $wishlist->user_id=Auth::id();
            $wishlist->prod_id=$prod_id;
            $wishlist->qty=$prod_qty;
            $wishlist->save();
            return response()->json(['status'=>$wishlist->product->name.' Wishlist added successfully']);
          }

        }else{
            return response()->json(['status'=>'please login']);
        }
    }

public function deletewishlist($id)
{
$wishlist=Wishlist::find($id);

$wishlist->delete();

 return redirect('show-wishlist')->with('status',' Has Been Delete Successfully');
}





public function updatewishlist(Request $request)
    {
        $prod=$request->prod_id;
        $qty=$request->prod_qty;
        $wishlist=Wishlist::where('prod_id',$prod)->where('user_id',Auth::id())->first();
        if($wishlist)
        {
            $wishlist->qty=$qty;
            $wishlist->update();
        }
    

    }










}
