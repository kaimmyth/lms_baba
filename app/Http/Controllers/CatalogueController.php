<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use Illuminate\Support\Facades\Session;

class CatalogueController extends Controller {

    public function Catalogue() {
        $catalogueList = Catalogue::where('catalogue_status', 'Active')->where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'catalogueList' => $catalogueList
        );
        $data['content'] = 'catalogue.catalogue';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function Add(Request $req) {
        $req->validate(array(
            'name' => 'required',
            'status' => 'required',
        ));
        $catalogue = new Catalogue;
        $checkCata = Catalogue::where('catalogue_name', 'like', $req->name . '%')->where('org_id', session::get('org_id'))->first();
        if ($checkCata) {
            session()->flash('error', 'This Ctalogue Alredy Exist In our Databse');
        } else {
            $catalogue->org_id = session::get('org_id');
            $catalogue->catalogue_name = $req->name;
            $catalogue->catalogue_status = $req->status;
            $catalogue->ip_address = $req->ip();
            $catalogue->created_by = session::get('id');
            $data = $catalogue->save();
            if ($data) {
                session()->flash('success', 'Catalogue Create Successfull...!');
            } else {
                session()->flash('error', 'Somthing Wrong...!');
            }
        }
        return redirect()->back();
    }

}
