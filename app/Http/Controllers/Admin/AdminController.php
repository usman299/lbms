<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }
    public function labIndex()
    {    $labUser = User::where('role','=',1)->get();
        return view('admin.lab.user.index',compact('labUser'));
    }
    public function labStore(Request $request)
    {

        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->business_name = $request->business_name;
        $user->address1 = $request->address1;
        $user->pc = $request->pc;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        $notification=array(
            'messege'=>'User Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
