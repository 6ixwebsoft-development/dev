<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Libraryremoteip;
use App\Models\Library;
use Session;
use Carbon\Carbon;
use DB;

class RemoteLoginController extends Controller
{
   public function index(Request $request)
   {
		$this->validate($request, [
				'libarary' => 'required',
				'librarycard' => 'required',
			]);
			
		$libarary_id = $request->post('libarary');
		$libarary_card = $request->post('librarycard');
		$digit = strlen($libarary_card);
		
		$data = Libraryremoteip::where('libraryid',$libarary_id)->where('remotedigit',$digit)->first();		
		
		if(!empty($data))
		{
			$isValid = $this->isValid_Card($data->remoteid,$libarary_card,$digit);
			if(!empty($isValid))
			{
				$ldata = Library::where('id',$libarary_id)->first();
				$lastlogin = array('last_login_at' => Carbon::now()->toDateTimeString());
				$query = DB::table('users')->where('id', $ldata->userid)->update($lastlogin);
				Session::put('remote_id', $ldata->id);
				Session::put('remote_name', $ldata->name);
				return redirect('/search-foundation');
			}else{
				$output	= ['class' => 'alert-danger',
					'msg' => __("library card not correct")
					];
				return redirect('en/remote')->with('message', $output);
			}
		}else{
			$output	= ['class' => 'alert-danger',
					'msg' => __("library card not correct")
					];
			return redirect('en/remote')->with('message', $output);
		}
   }
   
   
	public function isValid_Card($card,$usercard,$digit)
	{
	   for ($x = 0; $x < $digit; $x++) {
			if($card[$x] == '*'){
				$valid = true;
			}else{
				if($card[$x] == $usercard[$x]){	
					$valid = true;
				}else{
					return $valid = false;
				}
			}
		}
		return $valid;
	}
}
