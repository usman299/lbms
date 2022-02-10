<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    public function index(){
        $users = User::where('role', '2')->where('creator_id', Auth::user()->id)->get();
        return view('admin.patient.index', compact('users'));
    }
    public function create(){
        return view('admin.patient.create');
    }
    public function store(Request $request){
        $user = new User();
        $user->role = 2;
        $user->creator_id = Auth::user()->id;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->postal = $request->postal;

        $user->u_r_num = $request->u_r_num;
        $user->c_r_num = $request->c_r_num;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->ethnicity = $request->ethnicity;
        $user->passport = $request->passport;
        $user->town = $request->town;
        $user->swab_date = $request->swab_date;
        $user->swab_time = $request->swab_time;
        $user->wish = $request->wish;
        $user->country = $request->country;


        $user->password = Hash::make(12345678);
        $user->save();
        $notification=array(
            'messege'=>'User Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
