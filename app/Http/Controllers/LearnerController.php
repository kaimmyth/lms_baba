<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\RegisterController;

class LearnerController extends Controller {

    public function Home() {
        $instructorList = User::where('users_role', 4)->where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'instructorList' => $instructorList
        );
        $data['content'] = 'company.learner';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function AddLearner1(Request $req) {
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
                'org_id' => session::get('org_id'),
                'username' => $req->username,
                'email' => $req->email,
                'name' => $req->name,
                'password' => Hash::make($req->password),
                'users_role' => 4
            ));
            session()->flash('success', 'Learner Create Successful...!');
            return redirect()->back();
        }
    }

    public function AddLearner(Request $req) {
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
                'org_id' => session::get('org_id'),
                'username' => $req->username,
                'email' => $req->email,
                'name' => $req->name,
                'password' => Hash::make($req->password),
                'users_role' => 4
            ));
            session()->flash('success', 'Learner Create Successful...!');
            return redirect()->back();
        }
    }

    public function AddInstructorLearner(Request $req) {
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
                'org_id' => session::get('org_id'),
                'teacher_id' => Auth::user()->id,
                'username' => $req->username,
                'email' => $req->email,
                'name' => $req->name,
                'password' => Hash::make($req->password),
                'users_role' => 4
            ));
            session()->flash('success', 'Learner Create Successful...!');
            return redirect()->back();
        }
    }

}
