<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\CourseCode;

class CourseCodeController extends Controller {

    public function Code() {
        $cadeData = CourseCode::where('org_id', session::get('org_id'))->get();
        $returnData = array('cadeData' => $cadeData);
        $data['content'] = 'code.code';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function Add(Request $req) {
        $req->validate(array(
            'codeName' => 'required',
            'code' => 'required',
            'codeStatus' => 'required'
        ));

        $code = new CourseCode;

        $code->org_id = session::get('org_id');
        $code->code_name = $req->codeName;
        $code->code = $req->code;
        $code->code_status = $req->codeStatus;
        $code->ip_address = $req->ip();
        $code->created_by = session::get('id');
        $data=$code->save();
        if($data){
            session()->flash('success','codde create successful...!');
        }else{
            session()->flash('error','Somthing wrong...!');
        }
        return redirect()->back();
    }

}
