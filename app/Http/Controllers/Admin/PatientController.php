<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CertificateMail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;
class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function direct($id){
        return view('direct', compact('id'));
    }
    public function index(){
        if (Auth::user()->role == 0){
            $users = User::latest()->where('role', '2')->get();
        }else{
            $users = User::latest()->where('role', '2')->where('creator_id', Auth::user()->id)->get();
        }

        return view('admin.patient.index', compact('users'));
    }
    public function statusView($id){
        if (Auth::user()->role == 0){
            $users = User::where('role', '2')->where('status', $id)->get();
        }else{
            $users = User::where('role', '2')->where('status', $id)->where('creator_id', Auth::user()->id)->get();
        }

        return view('admin.patient.index', compact('users'));
    }
    public function create(){
        return view('admin.patient.create');
    }
    public function store(Request $request){

        $validator=$request->validate([

            'email' => 'required|string|email|max:255|unique:users',
            'u_r_num' => 'required|string|max:255|unique:users',

        ]);

        $user = new User();
        $user->role = 2;
        if ($request->creator_id){
            $user->creator_id = $request->creator_id;
        }else{
            $user->creator_id = Auth::user()->id;
        }

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
            'messege'=>'Patient Added Successsfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function show($id){
        $user = User::find($id);
        return view('admin.patient.show', compact('user'));
    }
    public function status($id, $status){
        $user = User::find($id);
        $user->status = $status;
        $user->result_date = Carbon::now();
        $user->update();

        $destinationPath = 'records';
        $taxform_name = 'certificate-'.$user->id.'.pdf';
        $filepath = $destinationPath.'/'.$taxform_name;
        $pdf = PDF::loadView('admin.email.certificate',compact('user'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->stream();
        file_put_contents($filepath, $pdf->output());

        $user->certificate_link = $filepath;
        $user->update();

        Mail::to($user->email)->send(new CertificateMail($user));
        $notification=array(
            'messege'=>'Status Update Successsfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function edit($id){
        $user = User::find($id);
        return view('admin.patient.edit', compact('user'));
    }
     public function delete($id){
        $user = User::find($id);
         $user->delete();
         $notification=array(
             'messege'=>'Patient Details Deleted Successsfully!',
             'alert-type'=>'error'
         );
         return Redirect()->back()->with($notification);
    }

    public function update(Request $request){
        $validator=$request->validate([
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $user = User::find($request->id);
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

        $user->save();
        $notification=array(
            'messege'=>'Patient Details Updated Successsfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
