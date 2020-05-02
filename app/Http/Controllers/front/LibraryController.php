<?php

namespace App\Http\Controllers\front;

use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LibraryContact;
use App\Models\Library;
use App\Models\Librarylogin;
use App\Models\Libraryips;
use App\Models\Libraryremoteip;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;
use DB;
use Hash;
use session;
class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$basic = Library::where('userid',$user->id)->first();
		$language = Language::where('status','1')->get();
		return view('library.index',compact('basic','language','user')); 
    }
	
	public function information()
    {
		$user = Auth::user();
		$basic = Library::where('userid',$user->id)->first();
		$language = Language::where('status','1')->get();
		return view('library.information',compact('basic','language')); 
    }
	
	public function library_login()
    {
		$user = Auth::user();
		return view('library.login',compact('user')); 
    }
    
	public function contact()
    {
		$country = Country::all();
		$city = City::all();
		$user = Auth::user();
		$contact = LibraryContact::where('userid',$user->id)->first();
		$language = Language::where('status','1')->get();
		return view('library.contact',compact('contact','language','country','city')); 
    }
	
	public function ip_setting()
    {
		$user = Auth::user();
		$basicID = Library::where('userid',$user->id)->first();
		
		$ips  = Libraryips::where('libraryid',$basicID->id)->get();
		return view('library.ip_setting',compact('ips','user')); 
    }
	
	public function remote_access()
    {
		$user = Auth::user();
		$basicID = Library::where('userid',$user->id)->first();
		$remoteips  = Libraryremoteip::where('libraryid',$basicID->id)->get();
		return view('library.remote_access',compact('remoteips','user')); 
    }
	
	public function remote_arena()
    {
		$user = Auth::user();
		$contact = LibraryContact::where('userid',$user->id)->first();
		return view('library.remote_arena',compact('user','contact')); 
    }
	
	public function static_report()
    {
		$user = Auth::user();
		$basic = Library::where('userid',$user->id)->first();
		return view('library.static_report',compact('basic')); 
    }
	
	public function account_history()
    {
		$user = Auth::user();
		$basic = Library::where('userid',$user->id)->first();
		return view('library.account_histroy',compact('basic')); 
    }
	
	public function information_edit(Request $request, $uid)
    {
		$basicID = Library::where('userid',$uid)->first();
		$id = $basicID->id;
		
		$basic = array(       
			"name"  => $request->post('library'),
			"languageid"  => $request->post('language'),
			"remark"  => $request->post('remark'),
			"updated_at"  =>now(),
		);
		$query = DB::table('library_basic')->where('id', $id)->update($basic);
		if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Library Information saved")
					];
		}else{
						$output	= ['class' => 'alert-danger',
					'msg' => __("Library Information Not saved")
					];

		}
		return redirect('library/manage/information')->with('message', $output);
    }
	
	public function contact_edit(Request $request, $uid)
    {
		$contact = array(
					"contactname"  => $request->post('contactname'),
					"email"  => $request->post('email'),
					"phone"  => $request->post('phone'),
					"mobile"  => $request->post('mobile'),
					"website"  => $request->post('website'),
					"contactaddress"  => $request->post('baddress'),
					"contactzip"  => $request->post('bzip'), 
					"contactcountry"  => $request->post('bcountry'),
					"contactcity"  => $request->post('bcity'),
					"postaladdress"  => $request->post('paddress'),
					"postalzip"  => $request->post('pzip'),
					"postalcountry"  => $request->post('pcountry'),
					"postalcity"  => $request->post('pcity'),		"updated_at"  =>now(),
			);
			$query = DB::table('library_contact')->where('libraryid', $uid)->update($contact);
			if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Libary contact saved")
					];
			}else{
			$output	= ['class' => 'alert-danger',
						'msg' => __("Libary contact Not saved")
						];

			}
			return redirect('library/manage/contact')->with('message', $output);
    }
	
	public function library_login_edit(Request $request, $uid)
    {
		$this->validate($request, [
            'password' => 'required|same:confirm-password',
        ]); 
		 $password = Hash::make($request->post('password'));
		 $userLog = array(
				"password"  => $password,
				"updated_at"  => Now(),
				);
		$query = DB::table('users')->where('id', $uid)->update($userLog);
		if($query){
				$output	= ['class' => 'alert-success',
					'msg' => __("Password saved")
					];
			}else{
				$output	= ['class' => 'alert-danger',
					'msg' => __("Password Not saved")
					];

			}
			return redirect('library/manage/login')->with('message', $output);
    }
	
	public function ip_setting_edit(Request $request, $uid)
    {
		$basicID = Library::where('userid',$uid)->first();
		$id = $basicID->id;
		$query ='';
		Libraryips::where('libraryid', $id)->delete();
		if(!empty($request->post('from1')))
		{
			$i =0;
			foreach($request->post('from1') as $form){
			$forms = $request->post('from2');
			$formss = $request->post('from3');
			$formsss = $request->post('from4');
			$to = $request->post('to1');
			$too = $request->post('to2');
			$tooo =$request->post('to3');
			$toooo = $request->post('to4');
			$fromips = $form.'.'.$forms[$i].'.'.$formss[$i].'.'.$formsss[$i].'';
			$toips = $to[$i].'.'.$too[$i].'.'.$tooo[$i].'.'.$toooo[$i].'';
			
			$ips = array(
			"libraryid"  => $id,
			"from"  => $fromips,
			"to"  => $toips,
			"created_at"  => now(),
			);
			$query = Libraryips::insert($ips);
			$i++; }
		} 
		if($query){
				$output	= ['class' => 'alert-success',
					'msg' => __("Library ip saved")
					];
			}else{
				$output	= ['class' => 'alert-danger',
					'msg' => __("Library ip Not saved")
					];

			}
			return redirect('library/manage/ip-setting')->with('message', $output);
    }
	
	
	
	public function remote_access_edit(Request $request, $uid)
    {
		$basicID = Library::where('userid',$uid)->first();
		$id = $basicID->id;
		$query ='';
		
		Libraryremoteip::where('libraryid', $id)->delete();
				if(!empty($request->post('remotedigit')))
				{
					$i =0;
					foreach($request->post('remotedigit') as $digit){
					$remoteid = $request->post('remoteid');
					if($digit != count($remoteid)){
						$output	= ['class' => 'alert-danger',
							'msg' => __("Digit not qual to Library card ")
							];
					return redirect('library/manage/remote-access')->with('message', $output);
					}else{
						
						$ips = array(
						"libraryid"  => $id,
						"remotedigit"  => $digit,
						"remoteid"  => $remoteid[$i],
						"created_at"  => now(),
						);
						
						$query = Libraryremoteip::insert($ips);
						$i++; 
						}
					}
				}
		if($query){
				$output	= ['class' => 'alert-success',
					'msg' => __("Library card saved")
					];
			}else{
				$output	= ['class' => 'alert-danger',
					'msg' => __("Library card Not saved")
					];

			}
			return redirect('library/manage/remote-access')->with('message', $output);
    }
	
	public function remote_arena_edit(Request $request, $uid)
    {
		$contact = array(
			"remotearena"  => $request->post('remotearena'),
			"updated_at"  =>now(),
			);
			$query = DB::table('library_contact')->where('userid', $uid)->update($contact);
			if($query){
			$output	= ['class' => 'alert-success',
					'msg' => __("Library domain pin saved")
					];
			}else{
							$output	= ['class' => 'alert-danger',
						'msg' => __("Library domain pin Not saved")
						];

			}
			return redirect('library/manage/remote-arena')->with('message', $output);
    }

}
