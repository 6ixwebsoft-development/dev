<?php

namespace App\Http\Controllers\Admin\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

use App\Models\LibraryContact;
use App\Models\Library;
use App\Models\Librarylogin;
use App\Models\Libraryips;
use App\Models\Libraryremoteip;
use App\User;
use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use App\Models\Purpose;
use App\Models\Documents;
use DataTables;
use DB;
use Hash;

class LibraryController extends Controller
{
     public function index(Request $request) {
        if ($request->ajax()) {
            $data = Library::select('id', 'library')->where('type','1')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/library/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('.$txt.')" href="'.url('admin').'/library/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.library.index');
    }
	
	public function create()
    {
		
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$userroles = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('library', 'id')->all();
		
        return view('admin.library.create',compact('roles','userroles','language','country','purpose','group'));
    }
	
	 public function store(Request $request)
    {
        try {
            $result = $request->all(); 
				
				$userLog = array(
				"email"  => $result['useremail'],
				"name"  => $result['library'],
				"password"  => $result['library'],
				"user_type" =>"LIB",
				"created_at"  => now(),
				);
				
				$user_id = User::insertGetId($userLog);
				
				
				$basic = array(
                    "userid" => $user_id,
                    "name"  => $result['library'],
                    "groupid"  => $result['group'],
                    "languageid"  => $result['language'],
                    "logintype"  => $result['logintype'],
                    "usernumber"  => $result['usertype'],
                    "availability"  => 1,
					"type"  => 1,
                    "remark"  => $result['lremarks'],
                    "created_at"  =>now(),
				);
            $LibraryId = Library::insertGetId($basic);
            
			  $contact = array(
					"userid" => $user_id,
					"libraryid"  =>  $LibraryId,
					"contactname"  => $result['contactname'],
					"email"  => $result['email'],
					"phone"  => $result['phone'],
					"mobile"  => $result['mobile'],
					"website"  => $result['website'],
					"remotearena"  => $result['rarena'],
					"contactaddress"  => $result['baddress'],
					"contactzip"  => $result['bzip'], 
					"contactcountry"  => $result['bcountry'],
					"contactcity"  => $result['bcity'],
					"postaladdress"  => $result['paddress'],
					"postalzip"  => $result['pzip'],
					"postalcountry"  => $result['pcountry'],
					"postalcity"  => $result['pcity'],
					"about_sve"  => $result['sveaboyt'],
					"about_eng"  => $result['engabout'],					
					"created_at"  =>now(),
			);
			LibraryContact::insert($contact);
			if(!empty($result['activeipstaus'])){$ips = $result['activeipstaus']; }else{$ips = 3;}
			if(!empty($result['activeremoteip'])){$rips = $result['remotename']; }else{$rips = 3;}
			$details = array(
                    "libraryid"  =>  $LibraryId,
                    "activeip"  =>  $ips,
					"remotename"  => $result['remotename'],
					"remoteactiveip"  => $rips,
                    "created_at"  =>now(),
				);
			
				Librarylogin::insert($details);
			//print_r($result);exit;
			if(!empty($result['from1']))
				{
					$i =0;
					foreach($result['from1'] as $form){
					$forms = $result['from2'];
					$formss = $result['from3'];
					$formsss = $result['from4'];
					$to = $result['to1'];
					$too = $result['to2'];
					$tooo = $result['to3'];
					$toooo = $result['to4'];
					$fromips = $form.'.'.$forms[$i].'.'.$formss[$i].'.'.$formsss[$i].'';
					$toips = $to[$i].'.'.$too[$i].'.'.$tooo[$i].'.'.$toooo[$i].'';
					
					$ips = array(
					"libraryid"  => $LibraryId,
					"from"  => $fromips,
					"to"  => $toips,
					"created_at"  => now(),
					);
					Libraryips::insert($ips);
					$i++; }
				} 
				
				if(!empty($result['remotedigit']))
				{
					$i =0;
					foreach($result['remotedigit'] as $digit){
					$remoteid = $result['remoteid'];
					$ips = array(
					"libraryid"  => $LibraryId,
					"remotedigit"  => $digit,
					"remoteid"  => $remoteid[$i],
					"created_at"  => now(),
					);
					Libraryremoteip::insert($ips);
					$i++; }
				}
				
				

		$output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/library')->with('status', $output);

    }
	
	public function edit($id)
	{
		$basic = Library::where('id',$id)->first();
		$contact = LibraryContact::where('libraryid',$id)->first();
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('library', 'id')->all();
		$details  = Librarylogin::where('libraryid',$id)->first();
		$ips  = Libraryips::where('libraryid',$id)->get();
		$remoteips  = Libraryremoteip::where('libraryid',$id)->get();
		$logo = Documents::where('userid',$id)->where('type','LIB')->where('filetype',1)->first();
			
        return view('admin.library.edit',compact('roles','userroles','language','country','purpose','group','basic','contact','details','ips','remoteips','logo'));
	}
	
	public function update(Request $request, $id) 
	{
		try {
			$result = $request->all();
				
				/* $userLog = array(
				"email"  => $result['uemail'],
				"name"  => $result['library'],
				"updated_at"  => Now(),
				);
				DB::table('users')->where('id', $id)->update($basic); */
				
				$basic = array(
                   
                    "name"  => $result['library'],
                    "groupid"  => $result['group'],
                    "languageid"  => $result['language'],
                    "logintype"  => $result['logintype'],
                    "usernumber"  => $result['usertype'],
                    "availability"  => 1,
                    "remark"  => $result['lremarks'],
                    "updated_at"  =>now(),
				);
				DB::table('library_basic')->where('id', $id)->update($basic);
				
				$contact = array(
					"contactname"  => $result['contactname'],
					"email"  => $result['email'],
					"phone"  => $result['phone'],
					"mobile"  => $result['mobile'],
					"website"  => $result['website'],
					"remotearena"  => $result['rarena'],
					"contactaddress"  => $result['baddress'],
					"contactzip"  => $result['bzip'], 
					"contactcountry"  => $result['bcountry'],
					"contactcity"  => $result['bcity'],
					"postaladdress"  => $result['paddress'],
					"postalzip"  => $result['pzip'],
					"postalcountry"  => $result['pcountry'],
					"postalcity"  => $result['pcity'],
					"about_sve"  => $result['sveaboyt'],
					"about_eng"  => $result['engabout'],					
					"updated_at"  =>now(),
			);
			DB::table('library_contact')->where('libraryid', $id)->update($contact);
				if(!empty($result['activeipstaus'])){
				$details = array(
                    "activeip"  =>  $result['activeipstaus'],
					"remotename"  => $result['remotename'],
					"remoteactiveip"  => $result['activeremoteip'],
                    "updated_at"  =>now(),
				);
				DB::table('librarylogin')->where('libraryid', $id)->update($details);
				}
			
		
		
				Libraryips::where('libraryid', $id)->delete();
				if(!empty($result['from1']))
				{
					$i =0;
					foreach($result['from1'] as $form){
					$forms = $result['from2'];
					$formss = $result['from3'];
					$formsss = $result['from4'];
					$to = $result['to1'];
					$too = $result['to2'];
					$tooo = $result['to3'];
					$toooo = $result['to4'];
					$fromips = $form.'.'.$forms[$i].'.'.$formss[$i].'.'.$formsss[$i].'';
					$toips = $to[$i].'.'.$too[$i].'.'.$tooo[$i].'.'.$toooo[$i].'';
					
					$ips = array(
					"libraryid"  => $id,
					"from"  => $fromips,
					"to"  => $toips,
					"created_at"  => now(),
					);
					Libraryips::insert($ips);
					$i++; }
				} 
				
				Libraryremoteip::where('libraryid', $id)->delete();
				if(!empty($result['remotedigit']))
				{
					$i =0;
					foreach($result['remotedigit'] as $digit){
					$remoteid = $result['remoteid'];
					$ips = array(
					"libraryid"  => $id,
					"remotedigit"  => $digit,
					"remoteid"  => $remoteid[$i],
					"created_at"  => now(),
					);
					Libraryremoteip::insert($ips);
					$i++; }
				}
				
			 if(!empty($request->file('logoImg')))
				{
					$imageName = time().'.'.request()->logoImg->getClientOriginalExtension();
					request()->logoImg->move(public_path('uploads/images'), $imageName);
					$datalogo = array(
						'userid'=> $id,
						'name'=> $imageName,
						'type'=> 'LIB',
						'filetype'=>1,
						'created_at'=>now(),
					);
					Documents::insert($datalogo);
				} 


		$output = ['success' => true,
					'msg' => __("Library updated")
					];
		} catch (\Exception $e) {
		
			$output = ['success' => false,
						'msg' => __("messages.something_went_wrong")
					];
		}

		return redirect('admin/library')->with('status', $output);
	}
	
	public function delete($id)
	{
		try {			
			Library::where('id', $id)->delete();
			LibraryContact::where('libraryid', $id)->delete();
			Libraryremoteip::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			
			$output = ['success' => true,
						'msg' => __("Module Field Deleted")
						];
		} catch (\Exception $e) {
		
			$output = ['success' => false,
						'msg' => __("messages.something_went_wrong")
					];
		}
		return redirect('admin/library')->with('status', $output);
	}
	
	
}

