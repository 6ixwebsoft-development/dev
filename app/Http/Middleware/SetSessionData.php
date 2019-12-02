<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;

class SetSessionData
{
    /**
     * Checks if session data is set or not for a user. If data is not set then set it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {

        if (!$request->session()->has('user')) {
            
            if (Auth::check()) {

                $user = Auth::user();
                $roles = Role::pluck('id')->all();
                $userRoleId = $user->roles->pluck('id')->all();
                $userRoleName = $user->roles->pluck('name')->all();
                $session_data = [
                    'userId' => $user->id, 
                    'roleId' => $userRoleId[0], 
                    'roleName' => $userRoleName[0] 
                ];   
                $request->session()->put('user', $session_data);

                //$user_type = 1;

            } else {

                //$user_type = 0;

            }
        }
        return $next($request);
    }
}
