<?php

namespace App\Http\Controllers;

use App\TestSeries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TestSeriesCategory;
use App\Course;
use App\test_series_questions;


class TestSeriesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $seriesData = TestSeries::with('category')->where('org_id', session::get('org_id'))->get();
        $categoryData = TestSeriesCategory::where('org_id', session::get('org_id'))->where('status', 'Active')->get();
        $courseList = Course::where('org_id', session::get('org_id'))->where('course_status', 'Active')->get();
        $returnData = array(
            'categoryData' => $categoryData,
            'courseList' => $courseList,
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
        // return $req;
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
        if($req->test_series_question!="" )
		{
            foreach ($req->test_series_question as $key => $value) {
              
                $test_series_questions = new test_series_questions();
                $test_series_questions->test_series_id = $TestSeries->id;
                $test_series_questions->org_id =  Session::get('org_id');
                $test_series_questions->question_id = $req->test_series_question[$key];
                $test_series_questions->save();
                // $mcq_questions=mcq_questions::where('id',$req->quizz_question[$key])->update(array(
                //     'move'=>1
                // ));
              
            }
        }
        if($req->quizz_question_remove!="" )
		{
            foreach ($req->quizz_question_remove as $key => $value) {
                test_series_questions::where('id',$value)->update(array(
                    'status'=>0
                ));
            }
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

    public function fetch_details(Request $Request) {
        // $data['quizz']=TestSeries::where('id',$Request->id)->first();
        $data['TestSeries']=TestSeries::where('test_series.id',$Request->id)
        ->leftjoin('test_series_categories', 'test_series_categories.id', '=', 'test_series.category_id')
        ->select(
            'test_series.id as id',
            'test_series.org_id as org_id',
            'test_series.category_id as category_id',
            'test_series.title as test_series_title',
            'test_series.time_limit as time_limit',
            'test_series.max_tries as max_tries',
            'test_series.status as status',
            'test_series.passing_marks as passing_marks',
            'test_series.total_marks as total_marks',
            'test_series.no_of_question as no_of_question',
            'test_series.instruction as instruction',
            'test_series.description as description',
            'test_series_categories.title as title'
           
        )
        ->first();



        // $data['test_series_questions']=test_series_questions::where('test_series_id',$Request->id)->get()->toArray();
        $data['test_series_questions']=test_series_questions::where('test_series_questions.test_series_id',$Request->id)
        ->where('test_series_questions.status',1)
        ->leftjoin('mcq_questions', 'mcq_questions.id', '=', 'test_series_questions.question_id')
        ->select(
            'test_series_questions.id as id',
            'test_series_questions.org_id as org_id',
            'test_series_questions.question_id as question_id',
            // 'mcq_questions.test_series_id as test_series_id',
            'mcq_questions.status as status',
            'mcq_questions.question as question'
   
        )
        ->get()->toArray();

		// echo ("<pre>");
		// print_r($data);
		// exit;
		
		return $data;
    }

// ----------------------------------------------- edit ---------------------------- 
    public function edit_show(Request $Request) {
        // $data['TestSeries']=TestSeries::where('id',$Request->id)->first();
        $data['TestSeries']=TestSeries::where('test_series.id',$Request->id)
        ->leftjoin('test_series_categories', 'test_series_categories.id', '=', 'test_series.category_id')
        ->select(
            'test_series.id as id',
            'test_series.org_id as org_id',
            'test_series.category_id as category_id',
            'test_series.title as title',
            'test_series.time_limit as time_limit',
            'test_series.max_tries as max_tries',
            'test_series.passing_marks as passing_marks',
            'test_series.total_marks as total_marks',
            'test_series.no_of_question as no_of_question',
            'test_series.instruction as instruction',
            'test_series.description as description',
            'test_series.status as status',
            'test_series_categories.title as title_for_categories'
        )
        ->first();



        // $data['test_series_questions']=test_series_questions::where('test_series_id',$Request->id)->get()->toArray();
        $data['test_series_questions']=test_series_questions::where('test_series_questions.test_series_id',$Request->id)
        ->where('test_series_questions.status', 1)
        ->leftjoin('mcq_questions', 'mcq_questions.id', '=', 'test_series_questions.question_id')
        ->select(
            'test_series_questions.id as id',
            'test_series_questions.org_id as org_id',
            'test_series_questions.test_series_id as test_series_id',
            'test_series_questions.question_id as question_id',
            'mcq_questions.question as question'
   
        )
        ->get()->toArray();



		// echo ("<pre>");
		// print_r($data);
		// exit;
		
		return $data;
    }


}
