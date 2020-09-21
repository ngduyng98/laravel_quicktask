<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $language = Session::get('lang', config('app.locate'));

        switch ($language) {
            case $english:
                $language = config('app.language.en');
                break;
            default:
                $laguage = config('app.language.vi');
        }
        App::setLocale($language);

        return $next($request);
    }
}
