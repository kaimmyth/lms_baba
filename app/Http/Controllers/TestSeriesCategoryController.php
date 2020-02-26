<?php

namespace App\Http\Controllers;

use App\TestSeriesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestSeriesCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $TestSeriesCategory = TestSeriesCategory::where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'testSeriesCategory' => $TestSeriesCategory,
        );
        $data['content'] = 'category.test-series';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    /**
     * Display a listing of category for learner.
     *
     * @return \Illuminate\Http\Response
     */
    public function TestSeriesCategory() {
        $TestSeriesCategory = TestSeriesCategory::where('org_id', session::get('org_id'))->where('status','Active')->get();
        $returnData = array(
            'testSeriesCategory' => $TestSeriesCategory,
        );
        $data['content'] = 'Test-Series.Test_series';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req) {
        $req->validate([
            'status' => 'required',
            'name' => 'required',
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
            $messege = 'Category Update Successfull...!';
            $TestSeriesCategory = TestSeriesCategory::find($req->id);
            $TestSeriesCategory->updated_by = session::get('id');
        } else {
            $messege = 'Category Create Successful...!';
            $TestSeriesCategory = new TestSeriesCategory();
            $TestSeriesCategory->created_by = session::get('id');
        }
        $TestSeriesCategory->org_id = session::get('org_id');
        $TestSeriesCategory->title = $req->name;
        $TestSeriesCategory->status = $req->status;
        $TestSeriesCategory->file = $image;
        $TestSeriesCategory->ip_address = $req->ip();
        $data = $TestSeriesCategory->save();
        if ($data) {
            session()->flash('success', $messege);
        } else {
            session()->flash('error', 'Something wrong...!');
        }
        return redirect()->back();
    }

    public function delete(Request $req) {
        if ($req->id) {
            $TestSeriesCategory = TestSeriesCategory::find($req->id);
            $TestSeriesCategory->ip_address = $req->ip();
            $TestSeriesCategory->deleted_by = session::get('id');
            $TestSeriesCategory->is_deleted = 1;
            $TestSeriesCategory->save();
            if ($TestSeriesCategory->delete()) {
                session()->flash('success', 'Category delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'certificate Id is required...!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestSeriesCategory  $testSeriesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TestSeriesCategory $testSeriesCategory) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestSeriesCategory  $testSeriesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSeriesCategory $testSeriesCategory) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestSeriesCategory  $testSeriesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestSeriesCategory $testSeriesCategory) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestSeriesCategory  $testSeriesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestSeriesCategory $testSeriesCategory) {
        //
    }

}
