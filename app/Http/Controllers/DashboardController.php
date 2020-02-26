<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {
    
    public function Admin(){
         $data['content'] = 'admin.dashboard';
        return view('layouts.content', compact('data'));
    }

    public function InstructorDashboard() {
        $data['content'] = 'instructor.dashboard';
        return view('layouts.content', compact('data'));
    }
    
    
    public function LearnerDashboard() {
        $data['content'] = 'learner.dashboard';
        return view('layouts.content', compact('data'));
    }

}
