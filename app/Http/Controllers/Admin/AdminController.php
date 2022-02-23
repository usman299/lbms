<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $validator=$request->validate([
            'username' => 'required|string|max:255|unique:users',

        ]);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->business_name = $request->business_name;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->postal = $request->pc;
        $user->pcr_rate = $request->pcr_rate;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        if ($request->partner){
            $user->partner = $request->partner;
        }else{
            $user->partner = 0;
        }
        if ($request->patients){
            $user->patients = $request->patients;
        }else{
            $user->patients = 0;
        }
        if ($request->add_patients){
            $user->add_patients = $request->add_patients;
        }else{
            $user->add_patients = 0;
        }
        if ($request->users){
            $user->users = $request->users;
        }else{
            $user->users = 0;
        }
        $user->save();
        $notification=array(
            'messege'=>'User Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
    public function partnerEdit($id){
        $user = User::find($id);
        return view('admin.lab.user.edit', compact('user'));
    }
    public function partnerUpdate(Request $request, $id){
        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
//        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->business_name = $request->business_name;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->postal = $request->pc;
        $user->pcr_rate = $request->pcr_rate;
        $user->role = $request->role;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
        if ($request->partner){
            $user->partner = $request->partner;
        }else{
            $user->partner = 0;
        }
        if ($request->patients){
            $user->patients = $request->patients;
        }else{
            $user->patients = 0;
        }
        if ($request->add_patients){
            $user->add_patients = $request->add_patients;
        }else{
            $user->add_patients = 0;
        }
        if ($request->users){
            $user->users = $request->users;
        }else{
            $user->users = 0;
        }
        $user->save();
        $notification=array(
            'messege'=>'User Added',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
