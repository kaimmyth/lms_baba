<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Certificate;

class CertificateController extends Controller {

    public function CreateCertificate() {
        $data['content'] = 'Certificate.create_certificate';
        return view('layouts.content', compact('data'));
    }

    public function Certificate() {
        $certificateData = Certificate::where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'certificateList' => $certificateData,
        );
        $data['content'] = 'Certificate.master';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function addCertificate(Request $req) {
        $req->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $image = $req->old_file;
        if ($req->file != '') {
            if ($files = $req->file('file')) {
                $destinationPath = 'public/upload'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $path = $files->move($destinationPath, $profileImage);
                $image = $insert['file'] = "$profileImage";
            }
        }
        if ($req->id > 0) {
            $messege = 'certificate Update Successfull...!';
            $certificate = Certificate::find($req->id);
            $certificate->updated_by = session::get('id');
        } else {
            $messege = 'certificate Create Successful...!';
            $certificate = new Certificate();
            $certificate->created_by = session::get('id');
        }
        $certificate->org_id = session::get('org_id');
        $certificate->name = $req->name;
        $certificate->status = $req->status;
        $certificate->file = $image;
        $certificate->ip_address = $req->ip();
        $data = $certificate->save();
        if ($data) {
            session()->flash('success', $messege);
        } else {
            session()->flash('error', 'Something wrong...!');
        }
        return redirect()->back();
    }

    public function deleteCertificate(Request $req) {
        if ($req->id) {
            $certificate = Certificate::find($req->id);
            $certificate->ip_address = $req->ip();
            $certificate->deleted_by = session::get('id');
            $certificate->is_deleted = 1;
            $certificate->save();
            if ($certificate->delete()) {
                session()->flash('success', 'certificate delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'certificate Id is required...!');
        }
        return redirect()->back();
    }

}
