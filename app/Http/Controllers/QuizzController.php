<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Session;
use App\Quizz;
use App\quizz_questions;

class QuizzController extends Controller {

    public function Quizz() {
        $courseList = Course::where('org_id', session::get('org_id'))->where('course_status', 'Active')->get();
        $quizzList = Quizz::with('course')->where('org_id', session::get('org_id'))->get();
        $returnData = array(
            'courseList' => $courseList,
            'quizzList' => $quizzList,
        );
        $data['content'] = 'Quizz.Quizz';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function add(Request $req) {
        // return $req;
        $req->validate([
            'title' => 'required',
            'course_id' => 'required',
            'time_limit' => 'required',
            'max_tries' => 'required',
            'no_of_question' => 'required',
            'instruction' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($req->id > 0) {
            $messege = 'Quizz Update Successfull...!';
            $quizz = Quizz::find($req->id);
            $quizz->updated_by = session::get('id');
        } else {
            $messege = 'Quizz Create Successful...!';
            $quizz = new Quizz();
            $quizz->created_by = session::get('id');
        }
        $quizz->org_id = session::get('org_id');
        $quizz->title = $req->title;
        $quizz->course_id = $req->course_id;
        $quizz->time_limit = $req->time_limit;
        $quizz->max_tries = $req->max_tries;
        $quizz->no_of_question = $req->no_of_question;
        $quizz->instruction = $req->instruction;
        $quizz->description = $req->description;
        $quizz->status = $req->status;
        $quizz->ip_address = $req->ip();
        if ($quizz->save()) {
            session()->flash('success', $messege);
        } else {
            session()->flash('error', 'Something Wrong...!');
        }

        if($req->quizz_question!="" )
		{
            foreach ($req->quizz_question as $key => $value) {
              
                $quizz_questions = new quizz_questions();
                $quizz_questions->quizz_id = $quizz->id;
                $quizz_questions->org_id =  Session::get('org_id');
                $quizz_questions->question_id = $req->quizz_question[$key];
                $quizz_questions->save();
              
            }
        }
        
        return redirect()->back();
    }

    public function deleteQuizz(Request $req) {
        if ($req->id) {
            $quizz = Quizz::find($req->id);
            $quizz->ip_address = $req->ip();
            $quizz->deleted_by = session::get('id');
            $quizz->deleted_at = date('Y-m-d H:i:s');
            $quizz->is_deleted = 1;
            $quizz->save();
            if ($quizz->delete()) {
                session()->flash('success', 'Quizz delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'Quizz Id is required...!');
        }
        return redirect()->back();
    }

    public function LearnerQuizz() {
        $quizzList = Quizz::with('course')->where('org_id', session::get('org_id'))->where('status','Active')->get();
        $returnData = array(
            'quizzList' => $quizzList,
        );
        $data['content'] = 'Quizz.student_quizz';
        return view('layouts.content', compact('data'))->with($returnData);
    }
    public function start() {
        return view('Quizz.quizz_demo');
    }

    public function show(Request $Request) {
        // $data['quizz']=Quizz::where('id',$Request->id)->first();
        $data['quizz']=Quizz::where('quizz.id',$Request->id)
        ->leftjoin('courses', 'courses.id', '=', 'quizz.course_id')
        ->select(
            'quizz.id as id',
            'quizz.org_id as org_id',
            'quizz.title as title',
            'quizz.course_id as course_id',
            'quizz.time_limit as time_limit',
            'quizz.max_tries as max_tries',
            'quizz.no_of_question as no_of_question',
            'quizz.instruction as instruction',
            'quizz.description as description',
            'quizz.status as status',
            'courses.course_name as course_name'
        )
        ->first();



        // $data['quizz_questions']=quizz_questions::where('quizz_id',$Request->id)->get()->toArray();
        $data['quizz_questions']=quizz_questions::where('quizz_questions.quizz_id',$Request->id)
        ->leftjoin('mcq_questions', 'mcq_questions.id', '=', 'quizz_questions.question_id')
        ->select(
            'quizz_questions.id as id',
            'quizz_questions.org_id as org_id',
            'quizz_questions.quizz_id as quizz_id',
            'quizz_questions.question_id as question_id',
            // 'quizz_questions.course_id as course_id',
            'mcq_questions.question as question'
   
        )
        ->get()->toArray();

		// echo ("<pre>");
		// print_r($data);
		// exit;
		
		return $data;
    }
    
}
