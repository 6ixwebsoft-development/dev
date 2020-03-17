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
    public function handlesssss($request, Closure $next)
    {   
	
		echo "asasasasas";
		die();
       // echo "_______1";
		if(Session::put('language') == 'en'){
           // echo "_______en";
			$this->setLoc('en');
		}elseif(Session::put('language') != 'en'){
           // echo "_______se";
            $this->setLoc('se');
        }

       // echo "_______2";

        return $next($request);
    }
	public function setLoc($val)
    {
		
        Session::put('language',$val);
		\App::setlocale(\Session::put('locale',$val));
    }
    public function getLoc()
    {
        Session::get('language');
    }
	
	public function handle($request, Closure $next)
    {
       if(\Session::has('locale'))
       {
           \App::setlocale(\Session::get('locale'));
       }
       return $next($request);
    }
	
}
