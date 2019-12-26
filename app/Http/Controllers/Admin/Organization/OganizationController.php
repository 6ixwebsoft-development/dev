<?php

namespace App\Http\Controllers\Admin\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Models\orgpurpose;
use App\Models\LibraryContact;
use App\Models\Library;
use App\Models\Librarylogin;
use App\Models\Libraryips;
use App\Models\Libraryremoteip;
use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use App\Models\Purpose;
use DataTables;
use DB;
use Hash;

class OganizationController extends Controller
{
   public function index(Request $request) {
        if ($request->ajax()) {
            $data = Library::select('id', 'library')->where('type','3')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/organization/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('.$txt.')" href="'.url('admin').'/organization/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.organization.index');
    }
	
	public function create()
    {
		
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$userroles = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('library', 'id')->all();
		
		
        return view('admin.organization.create',compact('roles','userroles','language','country','purpose','group'));
    }
	
	 public function store(Request $request)
    {
		 
			$this->validate($request, [
					'orgname' => 'required',
					'email' => 'required|email|',
					'userrole' => 'required',
					'availability' => 'required',
					'useremail' => 'required|email|unique:users,email',
					'mobile' => 'numeric',
					'phone' => 'numeric',
				]);
				DB::beginTransaction();
				
        try {
				
				$result = $request->all(); 
				/* print_r($result);exit;  */
				
				$userLog = array(
				"email"  => $result['useremail'],
				"name"  => $result['orgname'],
				"password"  => $result['orgname'],
				"user_type" =>"ORG",
				"created_at"  => Now(),
				);
		
				$user_id = User::insertGetId($userLog);
				
				DB::table('model_has_roles')->insert(
					['role_id' => $result['userrole'], 'model_type' => 'App\User','model_id' => $user_id]
				);
				
				$basic = array(
                    "userid" => $user_id,
                    "library"  => $result['orgname'],
                    "groupid"  => null,
                    "languageid"  => $result['language'],
                    "logintype"  => $result['logintype'],
                    "usernumber"  => $result['usertype'],
                    "availability"  =>  $result['availability'],
					"type"  => 3,
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
					"remotearena"  => null,
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

				if(!empty($result['remotedigit']) || !empty($result['remoteid']))
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
				
				if(!empty($result['purposelist']))
				{
					
				$purpose = array(
					"orgid" => $LibraryId ,
					"purposeid" => json_encode($result['purposelist']),
					"created_at"  => now(),
				);
				
				orgpurpose::insert($purpose);
				}
				

			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Organization created")
                            ];
			 DB::commit();
			 return redirect('admin/organization')->with('message', $output);
			 
			} catch (\Exception $e) {
            $output	= ['class' => 'alert-position-danger',
                            'msg' => __("Organization Not create".$e)
                            ];
			DB::rollBack();
			//echo $e;
			return redirect('admin/organization/create')->with('message', $output);
			}

       

    }
	
	public function edit($id)
	{
		$basic = Library::where('id',$id)->first();
		$user = User::where('id',$basic->userid)->first();
		$contact = LibraryContact::where('libraryid',$id)->first();
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('library', 'id')->all();
		$details  = Librarylogin::where('libraryid',$id)->first();
		
		$ips  = Libraryips::where('libraryid',$id)->get();
		$remoteips  = Libraryremoteip::where('libraryid',$id)->get();
		$purposes = orgpurpose::where('orgid',$id)->first();
		if(!empty($purposes->purposeid)){$purposeId = json_decode($purposes->purposeid);}else{$purposeId = '';}
		
        return view('admin.organization.edit',compact('roles','userroles','language','country','purpose','group','basic','contact','details','ips','remoteips','purposeId','user'));
	}
	
	public function update(Request $request, $id) 
	{
		$basic = Library::where('id',$id)->first();
		$this->validate($request, [
					'orgname' => 'required',
					'email' => 'required|email',
					'userrole' => 'required',
					'availability' => 'required',
					
					'mobile' => 'numeric',
					'phone' => 'numeric',
				]);
				DB::beginTransaction();
		try {
			$result = $request->all();
				
				$userLog = array(
				"email"  => $result['useremail'],
				"name"  => $result['orgname'],
				"updated_at"  => Now(),
				);
				DB::table('users')->where('id', $id)->update($userLog);
				
				DB::table('model_has_roles')->where('model_id', $id)->update(
					['role_id' => $result['userrole']]
				);
				
				$basic = array(
                    "library"  => $result['orgname'],
                    "groupid"  => null,
                    "languageid"  => $result['language'],
                    "logintype"  => $result['logintype'],
                    "usernumber"  => $result['usertype'],
                    "availability"  => $result['availability'],
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
					"remotearena"  => null,
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
			
				
				if(!empty($result['from1']))
				{
					Libraryips::where('libraryid', $id)->delete();
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
				
				
				if(!empty($result['remotedigit']))
				{
					Libraryremoteip::where('libraryid', $id)->delete();
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
			
				if(!empty($result['purposelist']))
				{
					
				$purpose = array(
					"orgid" => $id,
					"purposeid" => json_encode($result['purposelist']),
					"updated_at"  => now(),
				);
				if(orgpurpose::where('orgid',$id)->first()){
					DB::table('orgpurpose')->where('orgid', $id)->update($purpose);
				}else{
					orgpurpose::insert($purpose);
				}
				
				}
				

			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Organization updated")
                            ];
			 DB::commit();
			 return redirect('admin/organization')->with('message', $output);
		} catch (\Exception $e) {
		
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Organization Not create")
                            ];
			DB::rollBack();
			//echo $e;
			return redirect('admin/organization')->with('message', $output);
		}

		
	}
	
	public function delete($id)
	{
		try {			
			Library::where('id', $id)->delete();
			LibraryContact::where('libraryid', $id)->delete();
			Libraryremoteip::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			orgpurpose::where('orgid', $id)->delete();
			$basic = Library::where('id',$id)->first();
			User::where('id', $basic->userid)->delete();
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Organization deleted")
                            ];
		} catch (\Exception $e) {
		
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("something worng")
                            ];
		}
		return redirect('admin/organization')->with('message', $output);
	}
	
}
