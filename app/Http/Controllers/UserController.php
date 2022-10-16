<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function showuser()
    {
      $users=User::all();
      return view('backend.user.show',compact('users'));
    }

    public function edituser($id)
    {
        $user=User::find($id);
        return view('backend.user.edit',compact('user'));
    }
    public function updateuser(Request $request,$id)
    {
   $user=User::find($id);
   $user->name=$request->name;
   $user->email=$request->email;
   $user->role_as=$request->role_as;
   $user->update();
   return redirect('show-user')->with('status','User Has Been Update Successfully');
    }

    public function deleteuser($id)
    {
    $user=User::find($id);
    $user->delete();
    return redirect('show-user')->with('status','User Has Been Deleted Successfully');
    }
}
