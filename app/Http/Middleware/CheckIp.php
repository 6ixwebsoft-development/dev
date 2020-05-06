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
			$current_user_role = $user->getRoleNames();
			if($current_user_role[0] == 'User10 - Registered Free User')
			{
				$value = $this->check_ip();
			}else{
				$value = true;
			}
			
		}else{
			$value = $this->check_ip();
		}
		Session::put('checkip', $value);
        return $next($request);
    }
	
	public function check_ip()
	{
		$clientIP = $clientIP = request()->ip();//'192.168.0.103';/*$clientIP = request()->ip(); it is static ip change with dyanamic */
		
		$sqlQuery = "SELECT * FROM `libraryips` WHERE '$clientIP' BETWEEN `from` AND `to`";
		$result = DB::select(DB::raw($sqlQuery));
		if(!empty($result)){
			return $value = true;
		}else{
			return $value = false;
		}
	}
}
