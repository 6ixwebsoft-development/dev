<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visit;
use Session;

class PageView
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
		if(Session::get('libarary_id'))
		{
			$libarary_id = Session::get('libarary_id');
			$datavisit = Visit::savevisit($libarary_id,3,1);//1=for ip login,2=remote,3=pageview	
		}
        return $next($request);
    }
}
