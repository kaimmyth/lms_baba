<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;


class InstructorController extends Controller {

    public function Home() {
        $instructorList = User::where('users_role', 3)->where('org_id', Auth::user()->id)->get();
        $returnData = array(
            'instructorList' => $instructorList
        );
        $data['content'] = 'company.instructor';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function AddInstructor(Request $req) {
        $req->validate([
            'username' => 'required',
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        ]);
        $data = User::where('username', $req->username)->orWhere('email', $req->email)->first();
        if ($data) {
            session()->flash('error', 'Your Email Id Or Username Already Exist in our database..!');
            return redirect()->back();
        } else {
            User::create(array(
                'org_id' => Auth::user()->id,
                'username' => $req->username,
                'email' => $req->email,
                'name' => $req->name,
                'password' => Hash::make($req->password),
                'users_role' => 3
            ));
            session()->flash('success', 'Instructor Create Successful...!');
            return redirect()->back();
        }
    }
    
    public function InstructorLearner(){
         $instructorList = User::where('users_role', 4)->where('org_id', Auth::user()->org_id)->where('teacher_id', Auth::user()->id)->get();
        $returnData = array(
            'learnerList' => $instructorList
        );
        $data['content'] = 'instructor.learner';
        return view('layouts.content', compact('data'))->with($returnData);
    }

}
