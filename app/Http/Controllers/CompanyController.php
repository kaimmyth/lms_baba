<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller {

    public function Dashboard() {
//        dd(session::get('redirect_url'));
        $data['content'] = 'company.dashboard';
        return view('layouts.content', compact('data'));
    }

    public function Home() {
        $companyList = User::where('users_role', 2)->get();
        $returnData = array(
            'companyList' => $companyList
        );
        $data['content'] = 'admin.company';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function AddCompany(Request $req) {
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
            User::insert(array(
                'username' => $req->username,
                'email' => $req->email,
                'name' => $req->name,
                'password' => Hash::make($req->password),
                'users_role' => 2,
                'created_by' => Auth::user()->id
            ));
            session()->flash('sucess', 'Company Create Successful...!');
            return redirect()->back();
        }
    }

}
