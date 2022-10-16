<?php

namespace App\Http\Controllers;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addRating(Request $request)
    {
        $user_rating=Auth::id();
        $prod_id=$request->prod_id;
        $rate_no=$request->product_rating;

        if(Auth::check())
        {

            $existsrating=Rating::where('user_id',Auth::id())->where('prod_id',$prod_id)->exists();
            if($existsrating)
            {
               $updating=Rating::where('prod_id',$prod_id)->where('user_id',$user_rating)->first();
               $updating->rate_no=$rate_no;
               //echo $rate_no;
               $updating->update();
               return redirect()->back()->with('status','Your Rating Has Been Updated');
            }else{

        $rating=new Rating();


        $rating->user_id=Auth::id();
        $rating->prod_id= $prod_id;
        $rating->rate_no= $rate_no;
        $rating->save();
        return redirect()->back()->with('status','Thank You For Your Rating');
        }
    }

    }

   



}
