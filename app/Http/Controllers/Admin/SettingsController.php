<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        $settings = Settings::find(1);
        return view('admin.settings.index', compact('settings'));
    }
    public function certificateSettings(Request $request){
        $settings = Settings::find(1);

        if ($request->hasfile('logo')) {
            $image1 = $request->file('logo');
            $name = time() . 'logo' . '.' . $image1->getClientOriginalExtension();
            $destinationPath = 'logo/';
            $image1->move($destinationPath, $name);
            $settings->logo = 'logo/' . $name;
        }
        $settings->footer = $request->footer;
        $settings->save();

        $notification=array(
            'messege'=>'Settings Update Successsfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }
}
