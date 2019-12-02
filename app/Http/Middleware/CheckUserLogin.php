<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;

class CheckUserLogin
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
                $current_user = User::find($user->id);
                $roles = Role::pluck('id','name')->all();
                $userRole = $user->roles->pluck('id','name')->all();
                $user_type = 1;

            } else {

                $user_type = 0;

            }
            
        }
      
        return $next($request);
    }
}
