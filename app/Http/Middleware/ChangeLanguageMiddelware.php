<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLanguageMiddelware
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
        $local=$request->headers->get('accept-language');
        if ($local)
        app()->setLocale($local);
        return $next($request);
    }
}
