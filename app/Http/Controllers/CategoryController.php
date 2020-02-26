<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller {

    public function CourseCategory() {
        $cateData = CourseCategory::where('org_id', session::get('org_id'))->get();
        $returnData = array('cateData' => $cateData);
        $data['content'] = 'category.course';
        return view('layouts.content', compact('data'))->with($returnData);
    }

    public function CreateCourseCategory(Request $req) {
        $category = new CourseCategory;

        $req->validate([
            'categoryname' => 'required|max:255',
            'categoryStatus' => 'required|max:100',
        ]);

        $checkCate = CourseCategory::where('org_id', session::get('org_id'))->where('cate_name', 'like', $req->categoryname . '%')->first();
        if ($checkCate) {
            session()->flash('error', 'Category Already Exist in our database..!!');
        } else {
            $category->org_id = session::get('org_id');
            $category->cate_name = $req->categoryname;
            $category->cate_status = $req->categoryStatus;
            $category->ip_address = $req->ip();
            $category->created_by = session::get('id');
            $category->save();
            session()->flash('success', 'Instructor Create Successful...!');
        }
        return redirect()->back();
    }

}
