<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(Route::current());

        if (in_array($request->segment(1), config('app.supported_locales'))) {

            if (Session::has('locale')) {
            if ( $request->segment(1) != Session::get('locale')) {
                session()->put('locale', $request->segment(1));
            }
            }else{
                session(['locale' => $request->segment(1)]);
            }

            app()->setLocale($request->segment(1));

        }else {
            app()->setLocale(config('app.locale'));
            URL::defaults(['locale' => 'ar']);
            if (Session::has('locale')) {
                app()->setLocale(Session::get('locale'));
            }else{
                session(['locale' => config('app.locale')]);
                app()->setLocale(config('app.locale'));
            }

        }

        return $next($request);
    }
}
