<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;

class FrontLoginCheckController extends Controller
{
	function user_login()
	{
		$user = Auth::user();
        $current_user_role = $user->getRoleNames(); 
        $current_user = User::find($user->id);
        if(!empty($current_user_role[0])){
			if($current_user_role[0] == 'User40 - Paid Library/University/Organization' || $current_user_role[0] == 'User30 - Library/University/Organization'){
				return redirect()->guest('/library'); 
			}else{
				return redirect()->guest('/profile'); 
			}
				
		}
	}
}
