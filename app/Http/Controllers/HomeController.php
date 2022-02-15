<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 0){
            $users = User::where('role', '2')->get();
        }else{
            $users = User::where('role', '2')->where('creator_id', Auth::user()->id)->get();
        }
        $labortaries = User::where('role', '1')->get();
        return view('admin.index', compact('users','labortaries'));
    }
    public function filter(Request $request){
        if (Auth::user()->role == 0){
            $users = User::whereBetween('created_at', [$request->s_date, $request->e_date])->where('role', '2')->get();
        }else{
            $users = User::whereBetween('created_at', [$request->s_date, $request->e_date])->where('role', '2')->where('creator_id', Auth::user()->id)->get();
        }
        $labortaries = User::whereBetween('created_at', [$request->s_date, $request->e_date])->where('role', '1')->get();
        return view('admin.index', compact('users','labortaries'));
    }
}
