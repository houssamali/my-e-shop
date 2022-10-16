<?php

namespace App\Http\Controllers\backend;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{

    public function showproduct()
    {
        $products=Product::all();
        return view('backend.product.index',compact('products'));

    }


    public function addproduct()
    {
        $categories=Category::all();
        return view('backend.product.add',['categories'=>$categories]);
    }

    public function insertproduct(Request $request)
    {

        

        $request->validate([
            'name'=>'required',
            'small_description'=>'required',
            'long_description'=>'required',
            'price'=>'required',
            'image'=>'required',
           

        ]);

     $product=new Product();

     if($request->hasFile('image'))
     {
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;

        $file->move('uploads/products/images/',$filename);
        $product->image=$filename;
     }
     $product->cate_id=$request->cate_id;
     $product->name=$request->name;
     $product->small_description=$request->small_description;
     $product->long_description=$request->long_description;
     $product->price=$request->price;
     $product->over_price=$request->over_price;
     $product->tax=$request->tax;
     $product->qty=$request->qty;
     $product->status=$request->status==True?'1':'0';
     $product->trending=$request->trending==true?'1':'0';
     $product->public=$request->public==true?'1':'0';
     $product->save();
     return redirect('show-product')->with('status',$product->name .' Has Been Created Successfully');

    }


    
    
    public function editproduct($id)
    {
        //$category=Category::find($id);
        $product=Product::find($id);
        $category=Category::where('id',$product->cate_id)->first();
        return view('backend.product.edit',compact('product','category'));
    }


    public function updateproduct(Request $request,$id)
    {
        //$product= Product::find($id);
    
        
           
     $request->validate([
            'name'=>'required',
            'small_description'=>'required',
            'long_description'=>'required',
            'price'=>'required',
           
           

        ]);

     $product= Product::find($id);

     if($request->hasFile('image'))
     {
        $path='uploads/products/images/'.$product->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;

        $file->move('uploads/products/images/',$filename);
        $product->image=$filename;
        
     }
     $product->cate_id=$request->cate_id;
     $product->name=$request->name;
     $product->small_description=$request->small_description;
     $product->long_description=$request->long_description;
     $product->price=$request->price;
     $product->over_price=$request->over_price;
     $product->tax=$request->tax;
     $product->qty=$request->qty;
     $product->status=$request->status==True?'1':'0';
     $product->trending=$request->trending==true?'1':'0';
     $product->public=$request->public==true?'1':'0';
     $product->update();
     return redirect('show-product')->with('status',$product->name.' Has Been Updated Successfully');

    }

   


    public function deleteproduct($id)
    {
        $product=Product::find($id);
       
        $path='uploads/products/images/'.$product->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $product->delete();
        return redirect('show-product')->with('status',$product->name.' product Has Been Deleted Successfully');
    }

    

}