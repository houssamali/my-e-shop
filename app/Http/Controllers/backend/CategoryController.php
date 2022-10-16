<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function showcategory()
    {
        $categories=Category::all();
        return view('backend.category.index',['categories'=>$categories]);
    }
    public function addcategory()
    {
        return view('backend.category.add');
    }

    public function insertcategory(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required',
        ]);

     $category=new Category();

     if($request->hasFile('image'))
     {
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;

        $file->move('uploads/images/',$filename);
        $category->image=$filename;
     }
     $category->name=$request->name;
     $category->description=$request->description;
     $category->status=$request->status==True?'1':'0';
     $category->trending=$request->trending==true?'1':'0';
     $category->public=$request->public==true?'1':'0';
     $category->save();
     return redirect('show-category')->with('status','Category Has Been Created Successfully');
    }


    public function editcategory(Request $request,$id)
    {
        $categories=Category::where('id',$id)->first();
        return view('backend.category.edit',['categories'=>$categories]);
    }

     public function updatecategory(Request $request,$id)
    {
        $category=Category::find($id);
        if($request->hasFile('image'))
        {
           
     $path='uploads/images/'.$category->image;
    if(File::exists($path))
    {
      File::delete($path);
    }
        
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('uploads/images/',$filename);
        $category->image=$filename;
        
    }
     $category->name=$request->name;
     $category->description=$request->description;
     $category->status=$request->status==True?'1':'0';
     $category->trending=$request->trending==true?'1':'0';
     $category->public=$request->public==true?'1':'0';
     $category->update();
     return redirect('show-category')->with('status','Category Has Been Updated Successfully');
    }

    public function deletecategory($id)
    {
        $category=Category::find($id);

        $path='uploads/images/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $category->delete();
        return redirect('show-category')->with('status','Category Has Been Deleted Successfully');
    }
}
