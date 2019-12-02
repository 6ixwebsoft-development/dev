<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use App\User;

class Access
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
        $user = Auth::user();
    
       $route_path = $request->route()->getActionName();
       $route = explode("\\", $route_path);
       $route = end($route);
       $controller_action = explode('@', $route);
       $controller_action = implode('-', $controller_action);

       $allowed = false;
       try {
          $allowed = $user->hasPermissionTo($controller_action);

       } catch (PermissionDoesNotExist $e) {
         //permission doesn't exist in db
         $allowed = true;
       }

       if (!$allowed) {
          return redirect()->guest('/access-denied');
       }
       return $next($request);
    }
}
