<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use Illuminate\Support\Facades\Auth;
use App\Course;
use Illuminate\Auth\Access\Response;
use App\CourseCatalog;
use Illuminate\Support\Facades\Session;
use App\CourseCode;
use App\Catalogue;

class CourseController extends Controller {

    public function Course() {
        $courseList = Course::with('category')->where('org_id', session::get('org_id'))->get();
        $category = CourseCategory::where('org_id', session::get('org_id'))->where('cate_status', 'Active')->get();
        $returnDate = array(
            'category' => $category,
            'courseList' => $courseList,
        );
        $data['content'] = 'instructor.manage.courses';
        return view('layouts.content', compact('data'))->with($returnDate);
    }

    public function Catelog() {
        $catalogueList = Catalogue::where('org_id', session::get('org_id'))->where('catalogue_status', 'Active')->get();
        $courseList = Course::where('org_id', session::get('org_id'))->where('course_status', 'Active')->get();
        $catalogList = CourseCatalog::with('catalogueData')->with('courseData')->where('org_id', session::get('org_id'))->get();
        $returnDate = array(
            'courseList' => $courseList,
            'catalogueList' => $catalogueList,
            'catalogList' => $catalogList,
        );
        $data['content'] = 'instructor.manage.course_catelog';
        return view('layouts.content', compact('data'))->with($returnDate);
    }

    public function AddCourse(Request $req) {

        $req->validate(array(
            'id' => 'required',
            'courseName' => 'required|max:2000',
            'cate_id' => 'required',
            'courseCode' => 'required|max:255',
            'credit' => 'required|max:250',
            'certificate' => 'required|max:255',
            'document' => 'required|max:250',
            'status' => 'required|max:100',
            'courseType' => 'required|max:100',
            'description' => 'required'
        ));
        try {
            $code = strtoupper($req->courseCode);
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
                $cheeckCode = Course::where('course_code', $code)->where('org_id', session::get('org_id'))->where('id', '!=', $req->id)->first();
                if ($cheeckCode) {
                    session()->flash('error', $req->courseCode . ' Code already exist in our database please enter other code...!');
                }
                $messege = 'Course Update Successfull...!';
                $course = Course::find($req->id);
            } else {
                $cheeckCode = Course::where('course_code', $code)->where('org_id', session::get('org_id'))->first();
                if ($cheeckCode) {
                    session()->flash('error', $req->courseCode . ' Code already exist in our database please enter other code...!');
                }
                $messege = 'Course Create Successful...!';
                $course = new Course();
            }

            $course->org_id = session::get('org_id');
            $course->cate_id = $req->cate_id;
            $course->course_name = $req->courseName;
            $course->course_code = $code;
            $course->course_credit = $req->credit;
            $course->course_certificate = $req->certificate;
            $course->course_document = $req->document;
            $course->course_document_file = $image;
            $course->course_type = $req->courseType;
            $course->course_description = $req->description;
            $course->course_status = $req->status;
            $course->ip_address = $req->ip();
            $course->created_by = session::get('id');
            $course->updated_by = session::get('id');
            if ($course->save()) {
                session()->flash('success', $messege);
            } else {
                session()->flash('error', 'Something wrong...!');
            }
        } catch (Exception $ex) {
            session()->flash('error', $ex->getMessage());
        }
        return redirect()->back();
    }

    public function DeleteCourse(Request $req) {
        if ($req->id) {
            $course = Course::find($req->id);
            $course->ip_address = $req->ip();
            $course->deleted_by = session::get('id');
            $course->is_deleted = 1;
            $course->save();
            if ($course->delete()) {
                session()->flash('success', 'course delete Successfull...!');
            } else {
                session()->flash('error', 'Something Wrong...!');
            }
        } else {
            session()->flash('error', 'course id is required...!');
        }
        return redirect()->back();
    }

    public function UpdateProperties(Request $req) {
        $req->validate(array(
            'course_id' => 'required',
            'course_list' => 'required',
            'code_id' => 'required',
            'category_id' => 'required',
            'descriptionData' => 'required',
            'live_status' => 'required',
        ));
        $code= strtoupper($req->code_id);
        $cheeckCode = Course::where('course_code', $code)->where('org_id', session::get('org_id'))->where('id', '!=', $req->course_id)->first();
        if ($cheeckCode) {
            return json_encode(array('status' => 0, 'sms' => $req->code_id . ' Code already exist in our database please enter other code...!'));
        } else {
            $course = Course::find($req->course_id);
            if ($req->file != '') {
                if ($files = $req->file('file')) {
                    $destinationPath = 'public/upload'; // upload path
                    $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                    $path = $files->move($destinationPath, $profileImage);
                    $course->course_document_file = $insert['file'] = "$profileImage";
                }
            }
            $course->cate_id = $req->category_id;
            $course->course_description = $req->descriptionData;
            $course->live_status = $req->live_status;
            $course->updated_by = session::get('id');
            $course->course_code = $code;
            $data = $course->save();
            if ($data) {
                $courseData = Course::with('category')->with('language')->with('code')->where('id', $req->course_id)->first();
                return json_encode(array('status' => 1, 'sms' => 'Course Properties Update Successful...!', 'data' => json_decode($courseData)));
            } else {
                return json_encode(array('status' => 0, 'sms' => 'Something Wrong...!'));
            }
        }
    }

    public function updatePropertiesDetail(Request $req) {
        $req->validate([
            'language_id' => 'required',
            'course_id' => 'required',
            'credit' => 'required',
            'navigationPolicy' => 'required',
            'attempts' => 'required',
        ]);
        $course = Course::find($req->course_id);
        $course->language_id = $req->language_id;
        $course->course_credit = $req->credit;
        $course->navigation_policy = $req->navigationPolicy;
        $course->attempts = $req->attempts;
        $course->updated_by = session::get('id');
        $data = $course->save();
        if ($data) {
            $courseData = Course::with('category')->with('language')->with('code')->where('id', $req->course_id)->first();
            return json_encode(array('status' => 1, 'sms' => 'Course Detail Update Successful...!', 'data' => json_decode($courseData)));
        } else {
            return json_encode(array('status' => 0, 'sms' => 'Something Wrong...!'));
        }
    }

    public function updateCatalogue(Request $req) {
        $req->validate([
            'show_course_to' => 'required',
            'course_id' => 'required',
            'subscription_status' => 'required',
            'daterange' => 'required',
            'subscription_for' => 'required',
        ]);
        $course = Course::find($req->course_id);
        if ($req->file != '') {
            if ($files = $req->file('file')) {
                $destinationPath = 'public/upload'; // upload path
                $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $path = $files->move($destinationPath, $profileImage);
                $course->credit_file = $insert['file'] = "$profileImage";
            }
        }
        $course->show_course_to = $req->show_course_to;
        $course->subscription_status = $req->subscription_status;
        $course->subscription_during_date = $req->daterange;
        $course->subscription_for = $req->subscription_for;
        $course->updated_by = session::get('id');
        $data = $course->save();
        if ($data) {
            $courseData = Course::with('category')->with('language')->with('code')->where('id', $req->course_id)->first();
            return json_encode(array('status' => 1, 'sms' => 'Course Catalogue Update Successful...!', 'data' => json_decode($courseData)));
        } else {
            return json_encode(array('status' => 0, 'sms' => 'Something Wrong...!'));
        }
    }

    public function updateTimeOption(Request $req) {
        $req->validate([
            'course_id' => 'required',
            'start_data' => 'required',
            'end_date' => 'required',
            'day_validity' => 'required',
            'access_by' => 'required',
            'hour' => 'required',
            'minute' => 'required',
            'second' => 'required',
        ]);
        $course = Course::find($req->course_id);
        if ($req->expiration_status != '') {
            $course->expiration_status = $req->expiration_status;
        }
        $course->start_data = $req->start_data;
        $course->end_date = $req->end_date;
        $course->day_validity = $req->day_validity;
        $course->access_by = $req->access_by;
        $course->average_time = $req->hour . ':' . $req->minute . ':' . $req->second;
        $course->updated_by = session::get('id');
        $data = $course->save();
        if ($data) {
            $courseData = Course::with('category')->with('language')->with('code')->where('id', $req->course_id)->first();
            return json_encode(array('status' => 1, 'sms' => 'Course Time Option Update Successful...!', 'data' => json_decode($courseData)));
        } else {
            return json_encode(array('status' => 0, 'sms' => 'Something Wrong...!'));
        }
    }

    public function updateCertificateTemplate(Request $req) {
        $req->validate([
            'course_id' => 'required',
            'certificate_template' => 'required',
        ]);
        $course = Course::find($req->course_id);
        $course->certificate_template = $req->certificate_template;
        $course->updated_by = session::get('id');
        $data = $course->save();
        if ($data) {
            $courseData = Course::with('category')->with('language')->with('code')->where('id', $req->course_id)->first();
            return json_encode(array('status' => 1, 'sms' => 'Course Catalogue Update Successful...!', 'data' => json_decode($courseData)));
        } else {
            return json_encode(array('status' => 0, 'sms' => 'Something Wrong...!'));
        }
    }

    public function AddCourseCatalog(Request $req) {

        $req->validate(array(
            "course_id" => "required|integer",
            "catalog" => "required|array",
            "status" => "required",
        ));

        if (is_array($req->catalog) && !empty($req->catalog)) {
            foreach ($req->catalog AS $key => $value) {
                $catalog = new CourseCatalog;
                $checkCatalog = CourseCatalog::where('org_id', session::get('org_id'))->where('course_id', $req->course_id)->where('catalog', $value)->first();
                if ($checkCatalog) {
                    session()->flash('error', 'This Course already exist in ourdatabse...!');
                } else {
                    $catalog->org_id = session::get('org_id');
                    $catalog->course_id = $req->course_id;
                    $catalog->catalog = $value;
                    $catalog->catalog_status = $req->status;
                    $catalog->ip_address = $req->ip();
                    $catalog->created_by = session::get('id');
                    $data = $catalog->save();
                    if ($data) {
                        session()->flash('success', 'Course Catalog Create Successful...!');
                    } else {
                        session()->flash('error', 'Something Wrong...!');
                    }
                }
            }
        } else {
            session()->flash('error', 'Something Wrong...!');
        }
        return redirect()->back();
    }

}
