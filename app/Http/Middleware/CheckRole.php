<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Session;
use DB;

class CheckRole {

    public function handle($request, Closure $next) {
        if (Auth::check() && Auth::user()->users_role == 1) {
            Session::put(array(
                'id' => Auth::user()->id,
                'org_id' => Auth::user()->org_id,
                'users_role' => Auth::user()->users_role,
                'name' => Auth::user()->name,
                'username' => Auth::user()->username,
                'form_url' => $request->url(),
                'teacher_id' => Auth::user()->teacher_id,
                'redirect_url' => '/' . Auth::user()->name . '/admin',
            ));
            return $next($request);
        } elseif (Auth::check() && Auth::user()->users_role == 2) {
            Session::put(array(
                'id' => Auth::user()->id,
                'org_id' => Auth::user()->id,
                'users_role' => Auth::user()->users_role,
                'name' => Auth::user()->name,
                'username' => Auth::user()->username,
                'form_url' => $request->url(),
                'teacher_id' => Auth::user()->teacher_id,
                'redirect_url' => '/' . Auth::user()->name . '/company',
            ));
            return $next($request);
        } elseif (Auth::check() && Auth::user()->users_role == 3) {
            Session::put(array(
                'id' => Auth::user()->id,
                'org_id' => Auth::user()->org_id,
                'users_role' => Auth::user()->users_role,
                'name' => Auth::user()->name,
                'username' => Auth::user()->username,
                'form_url' => $request->url(),
                'teacher_id' => Auth::user()->teacher_id,
                'redirect_url' => '/' . Auth::user()->name . '/instructor',
            ));
            return $next($request);
        } elseif (Auth::check() && Auth::user()->users_role == 4) {
            Session::put(array(
                'id' => Auth::user()->id,
                'org_id' => Auth::user()->org_id,
                'users_role' => Auth::user()->users_role,
                'name' => Auth::user()->name,
                'username' => Auth::user()->username,
                'teacher_id' => Auth::user()->teacher_id,
                'form_url' => $request->url(),
                'redirect_url' => '/' . Auth::user()->name . '/learner',
            ));
            return $next($request);
        } else {
            Artisan::call('config:clear');
            Artisan::call('cache:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
            Artisan::call('config:cache');
            Session::flash('success', 'All Clear');
            return redirect('login');
        }
        return $next($request);
    }

}
