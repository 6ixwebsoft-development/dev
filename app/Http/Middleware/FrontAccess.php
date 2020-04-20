<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\User;
use Session;

class FrontAccess
{

    public function handle($request, Closure $next)
    {
		if(Session::get('remote_name'))
		{
			return $next($request);
		}else{
			$user = Auth::user();
			if(empty($user))
			{
				$allowed = true;
			}else
			{
			$current_user_role = $user->getRoleNames(); 
			$route_path = $request->route()->getActionName();
			$route = explode("\\", $route_path);
			$route = end($route);
			$controller_action = explode('@', $route);
			$controller_action = implode('-', $controller_action);

			try {
				$allowed = $user->hasPermissionTo($controller_action);

			} catch (PermissionDoesNotExist $e) {
			 //permission doesn't exist in db
			 $allowed = false;
			}
			}
			/* echo $current_user_role[0];echo '<br>';
			echo $controller_action; 
			echo '========';
			echo $allowed;exit; 
			*/
		   if (!$allowed) {
				 $output	= ['class' => 'alert-position-danger',
								'msg' => __("Access no allowed...!")
								];
				return redirect('/manage')->with('message', $output);
		   }
		}
       return $next($request);
    }
}
