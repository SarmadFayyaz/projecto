<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;
class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        if (!Session::has('locale'))
//        {
//            Session::put('locale',Config::get('app.locale'));
//            Session::save();
//        }
//        App::setLocale(session('locale'));
        app()->setLocale(session()->get('locale'));
        return $next($request);
    }
}
