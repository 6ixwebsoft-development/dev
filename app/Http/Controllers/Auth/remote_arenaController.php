<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LibraryContact;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Carbon\Carbon;
use App\Models\Library;
use Session;

class remote_arenaController extends Controller
{
    public function index(Request $request)
	{
		//echo $_SERVER['HTTP_REFERER'];
		if(!empty($_SERVER['HTTP_REFERER']))
		{
			$url = parse_url($_SERVER['HTTP_REFERER']);
			$data = LibraryContact::where('remotearena',$url['host'])->first();
			if(!empty($data))
			{
				$user = User::where('id',$data->userid)->first();
				$userroles = $user->roles->pluck('id','name')->first();
				//echo $userroles;exit;
				if($userroles != 9){
					return redirect('/');
				}else{
					$ldata = Library::where('id',$data->id)->first();
					$lastlogin = array('last_login_at' => Carbon::now()->toDateTimeString());
					$query = DB::table('users')->where('id', $ldata->userid)->update($lastlogin);
					Session::put('remote_id', $ldata->id);
					Session::put('remote_name', $ldata->name);
					return redirect('/search-foundation');
				}
			}else{
				return redirect('/');
			}
		}else{
			return redirect('/');
		}
	}
}
