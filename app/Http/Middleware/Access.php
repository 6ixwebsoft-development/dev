<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Models\Role;

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

      $settings = Settings::all();
      foreach ($settings as $row){
          //echo $row->value;
          app('config')->set($row->system_name,$row->value);
      }
                  
      $relation['SubscriptionController-userlist'] = "SubscriptiontypeController-create";
      $relation['SubscriptionController-getsubscriptiontype'] = "SubscriptiontypeController-create";
      //$relation["TransactionController-searchtransactiondata"] = "TransactionController-index";
      $relation["FoundationSearchController-advanceSearchdata"] = "FoundationSearchController-advanceSearch";
                  
      $user = Auth::user();

    
       $route_path = $request->route()->getActionName();
       $route = explode("\\", $route_path);
       $route = end($route);
       $controller_action = explode('@', $route);
	   if($controller_action[1] == 'store'){
		   $controller_action[1] = 'create';
		   $controller_action = implode('-', $controller_action);
	   }else if($controller_action[1] == 'update'){
		   $controller_action[1] = 'edit';
		   $controller_action = implode('-', $controller_action);
	   }else{
		   $controller_action = implode('-', $controller_action);
	   }
	   
       
		  //print_r($controller_action);
      if(!empty($relation[$controller_action])){
        $controller_action = $relation[$controller_action];
      }
      
      //print_r($controller_action);exit;
      $allowed = false;
	  
       try {
          $allowed = $user->hasPermissionTo($controller_action);
		
       } catch (PermissionDoesNotExist $e) {
         //permission doesn't exist in db
         $allowed = false;
       }
		//echo $allowed;exit;
       if (!$allowed) {
         // return redirect()->guest('/access-denied');
			    $output	= [
                      'class' => 'alert-position-danger',
                      'msg' => __("Access no allowed...!")
                    ];
			    return redirect('/home')->with('message', $output);
       }
       return $next($request);
    }
}
