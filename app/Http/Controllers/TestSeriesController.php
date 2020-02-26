<?php

namespace App\Http\Controllers;

use App\TestSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TestSeriesCategory;

class TestSeriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $seriesData = TestSeries::with('category')->where('org_id', session::get('org_id'))->get();
        $categoryData = TestSeriesCategory::where('org_id', session::get('org_id'))->where('status', 'Active')->get();
        $returnData = array(
            'categoryData' => $categoryData,
            'seriesData' => $seriesData,
        );
        $data['content'] = 'Test-Series.Test_series_create';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function TestSeries(Request $req) {
        $req->validate([
            'id' => 'required',
        ]);
        $seriesData = TestSeries::where('org_id', session::get('org_id'))->where('category_id',$req->id)->where('status', 'Active')->get();
        $categoryData = TestSeriesCategory::where('org_id', session::get('org_id'))->where('id',$req->id)->where('status', 'Active')->first();
        $returnData = array(
            'categoryData' => $categoryData,
            'seriesData' => $seriesData,
        );
        $data['content'] = 'Test-Series.Test_series_detail';
        return view('layouts.content', compact('data'))->with($returnData);
    }
    
    public function view(){
        $data['content'] = 'Test-Series.Test_series_enroll';
        return view('layouts.content', compact('data'));
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
            'title' => 'required',
            'category_id' => 'required',
            'time_limit' => 'required',
            'max_tries' => 'required',
            'no_of_question' => 'required',
            'instruction' => 'required',
            'description' => 'required',
            'status' => 'required',
            'total_marks' => 'required',
            'passing_marks' => 'required',
        ]);
        if ($req->id > 0) {
            $messege = 'Test Series Update Successfull...!';
            $TestSeries = TestSeries::find($req->id);
            $TestSeries->updated_by = session::get('id');
        } else {
            $messege = 'Test Series Create Successful...!';
            $TestSeries = new TestSeries();
            $TestSeries->created_by = session::get('id');
        }
        $TestSeries->org_id = session::get('org_id');
        $TestSeries->title = $req->title;
        $TestSeries->category_id = $req->category_id;
        $TestSeries->time_limit = $req->time_limit;
        $TestSeries->max_tries = $req->max_tries;
        $TestSeries->no_of_question = $req->no_of_question;
        $TestSeries->instruction = $req->instruction;
        $TestSeries->description = $req->description;
        $TestSeries->total_marks = $req->total_marks;
        $TestSeries->passing_marks = $req->passing_marks;
        $TestSeries->status = $req->status;
        $TestSeries->ip_address = $req->ip();
        if ($TestSeries->save()) {
            session()->flash('success', $messege);
        } else {
            session()->flash('error', 'Something Wrong...!');
        }
        return redirect()->back();
    }

    public function delete(Request $req) {
        if ($req->id) {
            $TestSeries = TestSeries::find($req->id);
            $TestSeries->ip_address = $req->ip();
            $TestSeries->deleted_by = session::get('id');
            $TestSeries->deleted_at = date('Y-m-d H:i:s');
            $TestSeries->is_deleted = 1;
            $TestSeries->save();
            if ($TestSeries->delete()) {
                session()->flash('success', 'Test Series delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'Test Series Id is required...!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestSeries  $testSeries
     * @return \Illuminate\Http\Response
     */
    public function show(TestSeries $testSeries) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestSeries  $testSeries
     * @return \Illuminate\Http\Response
     */
    public function edit(TestSeries $testSeries) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestSeries  $testSeries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestSeries $testSeries) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestSeries  $testSeries
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestSeries $testSeries) {
        //
    }

}
