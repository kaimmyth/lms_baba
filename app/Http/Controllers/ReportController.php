<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller {

    public function CourseReport() {
        $data['content'] = 'Course-Report.Course_report';
        return view('layouts.content', compact('data'));
    }

}
