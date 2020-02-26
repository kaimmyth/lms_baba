<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Course;
use App\Catalogue;
use App\CourseCatalog;
use App\CourseCategory;

class CatelogController extends Controller {

    public function LearnerCatelog() {
        $category = CourseCategory::where('cate_status', 'Active')->where('org_id',session::get('org_id'))->get();
        $catalog = Catalogue::where('catalogue_status', 'Active')->where('org_id',session::get('org_id'))->get();
        $course = Course::where('course_status', 'Active')->where('org_id',session::get('org_id'))->get();
//        $catalogdata = Catalogue::with('courseCatalog')->where('catalogue_status', 'Active')->get();
        $returnData = array(
            'catalog' => $catalog,
            'category' => $category,
            'course' => $course,
        );
//        return response()->json($returnData);
        $data['content'] = 'Student-Course-Catalog.student_catalog';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function filter(Request $req) {
        $catalog = array();
        $type = array();
        $category = array();
        $data = array();
        !empty(@$req->catalog) ? $catalog = json_decode(@$req->catalog) : $catalog = array();
        !empty(@$req->category) ? $category = json_decode(@$req->category) : $category = array();
        !empty(@$req->type) ? $type = json_decode(@$req->type) : $type = array();
        $categoryData = Course::whereIn('cate_id', $category)->where('org_id',session::get('org_id'))->distinct()->get();
        if (count($categoryData) > 0) {
            foreach ($categoryData AS $key => $value) {
                $data[] = $value;
            }
        }
        $typeData = Course::whereIn('course_type', $type)->where('org_id',session::get('org_id'))->distinct()->get();
        if (count($typeData) > 0) {
            foreach ($typeData AS $key => $value1) {
                $data[] = $value1;
            }
        }
        $catalogData = CourseCatalog::with('courseData')->where('org_id',session::get('org_id'))->whereIn('catalog',$catalog)->get();
        if (count($catalogData) > 0) {
            foreach ($catalogData AS $key=>$value2){
                $data[] = $value2->courseData;
            }
        }
        return json_encode(array_unique($data));
    }

}
