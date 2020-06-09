<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Libraryips;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Visit;

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

		if(!empty($result))
			{
				foreach($result as $Res)
				{
					$library_id = $Res->libraryid;
				}
				if(!Session::get('checkip') )
				{
					Session::put('libarary_id', $library_id);
					$data = Visit::savevisit($library_id,1,1);
				}
				//1=for ip login,2=remote,3=pageview
				//exit;
				return $value = true;
			}else{
				return $value = false;
			}
	}
}
