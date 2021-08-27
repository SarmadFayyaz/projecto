<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Company {
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'company') {
        if (!Auth::guard($guard)->check()) {
            return redirect('company/login');
        }

        return $next($request);
    }
}
