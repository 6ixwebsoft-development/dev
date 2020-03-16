<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class SetLocale
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
		if(Session::get('language') == 'en'){
			app()->setLocale(Session::get('language'));
		}else{
			app()->setLocale('');
		}
        return $next($request);
    }
	
}
