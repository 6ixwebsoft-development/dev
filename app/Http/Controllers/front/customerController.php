<?php

namespace App\Http\Controllers\front;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use session;

use App\Models\Country;
use App\Models\City;
use App\Models\UserSearchSave;
use App\Models\Foundation;
use App\Models\Language;
use App\Models\Userinfo;

class customerController extends Controller
{
    public function index()
    {
		$user = Auth::user();
		return view('customer.index',compact('user')); 
    }
	
	public function get_foundation()
	{
		$user = Auth::user();
		$current_user_role = $user->getRoleNames(); 
		/* echo Session::get('checkip');exit; */
		$foundation = Foundation::leftjoin('gg_user_search_save as us', 'gg_foundation.id', 'us.foundation_id')
		->select(
			"gg_foundation.id",
			"name", 
			"us.display"			
		)->where('us.user_id',$user->id)->orderBy('gg_foundation.id','desc')->get();
		
		return view('customer.foundation',compact('foundation'));
	}
	
	public function get_basicinfo()
	{
		$user = Auth::user();
		$language = Language::where('status','1')->get();
		$userinfo = Userinfo::where('userid',$user->id)->first();
		
		return view('customer.basicinfo',compact('user','language','userinfo')); 
	}
	
	public function get_contactinfo()
	{
		$user = Auth::user();
		$language = Language::where('status','1')->get();
		$userinfo = Userinfo::where('userid',$user->id)->first();
		$country = Country::all();
		$city = City::all();
		return view('customer.contactinfo',compact('user','language','userinfo','country','city'));
	}
	
	public function get_admin()
	{
		$user = Auth::user();
		return view('customer.login',compact('user')); 
	}
	
	public function get_cardnumber()
	{
		$user = Auth::user();
		$userinfo = Userinfo::where('userid',$user->id)->first();
		return view('customer.library',compact('user','userinfo')); 
	}
	
	public function edit_basicinfo(Request $request,$id)
	{
		$this->validate($request, [
					'fname' => 'required',
					'language' => 'required',
				]);
		$basic = array(
			'fname' => $request->post('fname'),
			'lname' => $request->post('lname'),
			'language' => $request->post('language'),
		);
		
		$username = array('name' => $request->post('fname'),);
		$query = DB::table('users')->where('id', $id)->update($username);
		
		$query = DB::table('userinfo')->where('userid', $id)->update($basic);
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Data Saved..")
					];
		}else{
						$output	= ['class' => 'alert-danger',
					'msg' => __("Data not Saved")
					];

		}
		return redirect('customer/edit/basicinfo')->with('message', $output);
	}
	
	public function edit_contactinfo(Request $request,$id)
	{
		$basic = array(
			'streetadress' => $request->post('streetadress'),
			'zipcode' => $request->post('zipcode'),
			'country' => $request->post('bcountry'),
			'city' => $request->post('bcity'),
			'phone' => $request->post('phone'),
			'mobile' => $request->post('mobile'),
		);
		$query = DB::table('userinfo')->where('userid', $id)->update($basic);
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Contact data Saved..")
					];
		}else{
						$output	= ['class' => 'alert-danger',
					'msg' => __("Contact data not Saved")
					];
		}
		return redirect('customer/edit/contactinfo')->with('message', $output);
	}
	
	public function edit_login(Request $request,$id)
	{

		$this->validate($request, [
				'email' => 'required|email|unique:users,email,'.$id,
				'password' => 'same:confirm-password',
				]);
				
		$basic = array(
			'email' => $request->post('email'),
			'password' => Hash::make($request->post('password')),
		);
		$query = DB::table('users')->where('id', $id)->update($basic);
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Login data Saved..")
					];
		}else{
			$output	= ['class' => 'alert-danger',
					'msg' => __("Login data not Saved")
					];
		}
		return redirect('customer/edit/admin')->with('message', $output);
	}
	
	public function edit_library(Request $request,$id)
	{

		$this->validate($request, [
				'librarycity' => 'required',
				'librarycard' => 'required',
				]);
				
		$basic = array(
			'librarycity' => $request->post('librarycity'),
			'librarycard' => $request->post('librarycard'),
		);
		
		$query = DB::table('userinfo')->where('userid', $id)->update($basic);
		
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Library card Saved..")
					];
		}else{
			$output	= ['class' => 'alert-danger',
					'msg' => __("Library card not Saved")
					];
		}
		return redirect('customer/edit/cardnumber')->with('message', $output);
	}
	
	public function delete_save_found($id)
	{
		$user = Auth::user();
		$query = DB::table('gg_user_search_save')->where('foundation_id', $id)->where('user_id', $user->id)->delete();
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Foundation deleted")
					];
		}else{
			$output	= ['class' => 'alert-danger',
					'msg' => __("Foundation not deleted")
					];
		}
		return redirect('customer/edit/foundations')->with('message', $output);
	}
	
}
