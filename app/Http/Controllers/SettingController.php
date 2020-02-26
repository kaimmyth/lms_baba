<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller {

    public function PrivacyPolicy() {
        $data['content'] = 'privacy-policy';
        return view('layouts.content', compact('data'));
    }

    public function TermCondition() {
        $data['content'] = 'terms-condition';
        return view('layouts.content', compact('data'));
    }
    
    public function AdvanceSetting() {
        $data['content'] = 'setting';
        return view('layouts.content', compact('data'));
    }
    
    public function CookiePolicy() {
        $data['content'] = 'cookie-policy';
        return view('layouts.content', compact('data'));
    }

}
