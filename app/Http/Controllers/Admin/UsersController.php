<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $users = User::latest()->where('role', '0')->where('id', '!=', 1)->get();
        return view('admin.users.index', compact('users'));
    }
    public function delete($id){
        $users = User::find($id);
        $users->delete();
        $notification=array(
            'messege'=>'User Details Deleted Successsfully!',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
}
