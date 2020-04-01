<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;

class CheckLogin
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
        $current_user_role = $user->getRoleNames(); 
        $current_user = User::find($user->id);
        
        if(!empty($current_user_role[0])){

            $link = Role::where('name', $current_user_role[0])->select('link')->get();
            //print_r($link);exit;
            if(empty($link[0]->link)) {
                return redirect()->guest('/');
            }elseif($link[0]->link == '/admin'){
              return $next($request); 
            }elseif($link[0]->link == '/profile'){
              return redirect()->guest('/profile');  
            }

        }

        
        return redirect()->guest('/');
        
    }
}
