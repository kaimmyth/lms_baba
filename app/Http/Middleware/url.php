<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class url {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        Session::put(array(
            'form_url' => $request->url(),
        ));
//        dd($request->url());
        return $next($request);
    }

}
