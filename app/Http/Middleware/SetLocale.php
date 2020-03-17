<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\url;
use Session;

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
        echo "_______1";
		if($request->segment(1) == 'en'){
            echo "_______en";
			$this->setLoc('en');
		}elseif($request->segment(1) != 'se'){
            echo "_______se";
            $this->setLoc('se');
        }

        echo "_______2";

        return $next($request);
    }
	public function setLoc($val)
    {
        Session::put('language',$val);
    }
    public function getLoc()
    {
        Session::get('language');
    }
}
