<?php

namespace App\Http\Controllers\frontend;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
  


    public function index()
    {
      
     

        $products=Product::where('trending',1)->get();
        $public=Product::where('public',1)->get();
        $categories=Category::all();
           
      
        if(Auth::check())
        {
        $wishlistcount=Wishlist::where('user_id',Auth::id())->get();
        
          $cartcount=Cart::where('user_id',Auth::id())->get();
        Session::put('counts',['cartcount'=>$cartcount,'wishlistcount'=>$wishlistcount]);
    }

        return view('frontend.index',compact('categories','products','public'));
    }

    public function showcategory($id)
    {
   
   $categories=Category::find($id);
   $public=Product::where('public',1)->get();
   $products=Product::where('cate_id',$categories->id)->get();
   
   return view('frontend.category.show',compact('products','categories','public'));
    }



    public function showdetails($id)
    {
  
  $product=Product::find($id);
  
  $evalute=Rating::where('prod_id',$product->id)->sum('rate_no');
  
  $ratcount=Rating::where('prod_id',$product->id)->get('rate_no')->count();
 
 if(Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->exists())
 {
   
  $ratings=Rating::where('prod_id',$product->id)->where('user_id',Auth::id())->first();
  $ratingtotal=$ratings->rate_no;
  //$ev=$evalute / $ratcount;
 
 }else{
  $ratings='0';
  $ratingtotal="0";
  //$ev="0";
 }
 if($evalute)
 {
  $ev=$evalute / $ratcount;
 }else{
  $ev="0";
 }

 

  $category=Category::where('id',$product->cate_id)->first();
  return view('frontend.product.show',compact('product','category','ratings','ratingtotal','ratcount','ev','evalute'));
    }

    
}
