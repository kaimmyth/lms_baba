<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Session;
use App\LearningPlan;
use App\PlanCode;

class PlanController extends Controller {

    public function LearingPlan() {
        $courseList = Course::where('org_id', session::get('org_id'))->where('course_status', 'Active')->get();
        $learningPlanList = LearningPlan::with('course')->where('org_id', session::get('org_id'))->get();
        $retunData = array(
            'courseList' => $courseList,
            'learningPlanList' => $learningPlanList,
        );
//        return response()->json($retunData);
        $data['content'] = 'instructor.manage.learning_plan';
        return view('layouts.content', compact('data'))->with($retunData);
    }

    public function AddLearingPlan(Request $req) {

        $req->validate(array(
            'planName' => 'required',
            'course_id' => 'required',
            'plan_code' => 'required',
            'status' => 'required',
        ));

        $image = $req->old_file;
        if ($req->file != '') {
            if ($files = $req->file('file')) {
                $destinationPath = 'public/upload'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $path = $files->move($destinationPath, $profileImage);
                $image = $insert['file'] = "$profileImage";
            }
        }

        $plan_after_access = 'No';
        $plan_after_enrollment = 'No';
        $plan_inrollment_link = 'No';
        $plan_catalog = 'No';
        if ($req->plan_catalog) {
            $plan_catalog = $req->plan_catalog;
        }
        if ($req->plan_inrollment_link) {
            $plan_inrollment_link = $req->plan_inrollment_link;
        }
        if ($req->plan_after_access) {
            $plan_after_access = $req->plan_after_access;
        }
        if ($req->plan_after_enrollment) {
            $plan_after_enrollment = $req->plan_after_enrollment;
        }
        $code = strtoupper($req->plan_code);
        if ($req->id > 0) {
            $cheeckCode = LearningPlan::where('plan_code', $code)->where('org_id', session::get('org_id'))->where('id', '!=', $req->id)->first();
            if ($cheeckCode) {
                session()->flash('error', $req->plan_code . ' Code already exist in our database please enter other code...!');
            }
            $messege = 'Learning Plan Update Successfull...!';
            $plan = LearningPlan::find($req->id);
        } else {
            $cheeckCode = LearningPlan::where('plan_code', $code)->where('org_id', session::get('org_id'))->first();
            if ($cheeckCode) {
                session()->flash('error', $req->plan_code . ' Code already exist in our database please enter other code...!');
            }
            $messege = 'Learning Plan Create Successful...!';
            $plan = new LearningPlan;
        }

        $plan->org_id = session::get('org_id');
        $plan->course_id = $req->course_id;
        $plan->plan_name = $req->planName;
        $plan->plan_status = $req->status;
        $plan->plan_file = $image;
        $plan->plan_code = $code;
        if ($req->plan_description) {
            $plan->plan_description = $req->plan_description;
        }
        if ($req->plan_validity) {
            $plan->plan_validity = $req->plan_validity;
        }

        if ($req->plan_channel) {
            $plan->plan_channel = $req->plan_channel;
        }
        if ($req->plan_Certificate) {
            $plan->plan_Certificate = $req->plan_Certificate;
        }
        if ($req->plan_credit) {
            $plan->plan_credit = $req->plan_credit;
        }
        $plan->plan_catalog = $plan_catalog;
        $plan->plan_after_access = $plan_after_access;
        $plan->plan_after_enrollment = $plan_after_enrollment;
        $plan->plan_inrollment_link = $plan_inrollment_link;
        $plan->ip_address = $req->ip();
        $plan->created_by = session::get('id');
        $plan->updated_by = session::get('id');
        $data = $plan->save();
        if ($data) {
            session()->flash('success', $messege);
        } else {
            session()->flash('error', 'Something wrong...!');
        }
        return redirect()->back();
    }

    public function DeletePlan(Request $req) {
        if ($req->id) {
            $plan = LearningPlan::find($req->id);
            $plan->ip_address = $req->ip();
            $plan->deleted_by = session::get('id');
            $plan->is_deleted = 1;
            $plan->save();
            if ($plan->delete()) {
                session()->flash('success', 'Learning Plan delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'Learning Plan Id is required...!');
        }
        return redirect()->back();
    }

    public function Code() {
        $codeList = PlanCode::where('org_id', session::get('org_id'))->get();
        $retunData = array(
            'codeList' => $codeList
        );
        $data['content'] = 'code.plan-code';
        return view('layouts.content', compact('data'))->with($retunData);
    }

    public function AddCode(Request $req) {
        $req->validate(array(
            'codeName' => 'required',
            'code' => 'required',
            'codeStatus' => 'required',
        ));
        $planCode = new PlanCode;

        $planCode->org_id = session::get('org_id');
        $planCode->plan_name = $req->codeName;
        $planCode->code = $req->code;
        $planCode->plan_code_status = $req->codeStatus;
        $planCode->ip_address = $req->ip();
        $planCode->created_by = session::get('id');
        $data = $planCode->save();
        if ($data) {
            session()->flash('success', 'Plan Code Create Successfull....!');
        } else {
            session()->flash('success', 'Somthing wrong....!');
        }
        return redirect()->back();
    }

}
