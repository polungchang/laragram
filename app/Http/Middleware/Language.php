<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

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
        if (session()->has('applocale') && array_key_exists($applocale=session('applocale'), config('languages'))) {
            
            App::setLocale($applocale);

        } else {
            
            App::setLocale(config('app.locale'));

        }

        return $next($request);
    }
}
