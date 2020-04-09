<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Libraryips;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;


class CheckIp
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
		
		$user = Auth::user();
		if(!empty($user))
		{
			$value = true;
		}else{
			$clientIP = '192.168.0.103';/*$clientIP = request()->ip(); it is static ip change with dyanamic */
		
			$sqlQuery = "SELECT * FROM `libraryips` WHERE '$clientIP' BETWEEN `from` AND `to`";
			$result = DB::select(DB::raw($sqlQuery));
			if(!empty($result)){
				$value = true;
			}else{
				$value = true;
			}
		}
		
		Session::put('checkip', $value);
        return $next($request);
    }
}
