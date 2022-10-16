<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $product=Product::where('name',$request->name)->first();
        
        if($product)
        {
            $product=Product::where('name',$request->name)->first();
            return view('frontend.search.search',compact('product'));
        }else{
            
            return redirect('/')->with('status2','Your Search Not Found');
        }
        
        
    }
}
