<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
    $order=Order::all()->count();
    $user=User::all()->count();
    $product=Product::all()->count();
    $category=Category::all()->count();
    //echo $category;
    return view('backend.dashboard',compact('order','user','product','category'));
    }
}
