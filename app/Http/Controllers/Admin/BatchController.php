<?php

namespace App\Http\Controllers\Admin;

use App\Batch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function store(Request $request, $id){
        $batch = new Batch();
        $batch->patient_id = $id;
        $batch->batch_no = $request->batch_no;
        $batch->sample = $request->sample;
        $batch->test_date = $request->test_date;
        $batch->test_time = $request->test_time;
        $batch->save();
        $notification=array(
            'messege'=>'Patient Added Successsfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function delete($id){
        $batch = Batch::find($id);
         $batch->delete();
         $notification=array(
             'messege'=>'Batch Details Deleted Successsfully!',
             'alert-type'=>'error'
         );
         return Redirect()->back()->with($notification);
    }

    public function update(Request $request){
         $batch = Batch::find($request->id);
        
        $batch->batch_no = $request->batch_no;
        $batch->sample = $request->sample;
        $batch->test_date = $request->test_date;
        $batch->test_time = $request->test_time;
        $batch->save();
        $notification=array(
            'messege'=>'Details Updated Successsfully!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
