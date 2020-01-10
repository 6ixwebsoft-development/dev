<?php

namespace App\Http\Controllers\Admin\Organization;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;

use App\Models\Usertyperole;
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
use App\Models\Documents;
use DataTables;
use DB;
use Hash;

class OganizationController extends Controller
{
   public function index(Request $request) {
        if ($request->ajax()) {
            $data = Library::select('id', 'name','userid')->where('type','3')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/organization/'.$row->userid.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('.$txt.')" href="'.url('admin').'/organization/delete/'.$row->userid.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.organization.index');
    }
	
	public function create()
    {
		
		/* $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Purpose')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $purpose = array();
        foreach ($purposes as $purposeVal) {
            $purpose[$purposeVal->id] = $purposeVal->value;
        } */
		
		//$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$userroles = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('name', 'id')->all();
		$rolesIds = Usertyperole::where('type','TESt')->first();		
		$roleid = json_decode($rolesIds,TRUE);
		$dataids = $roleid['role_ids'];
		$roles = Role::select('name','id')->whereIn('id', ["8","9"])->get(); 
		
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
                    "name"  => $result['orgname'],
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
	
	public function edit($uid)
	{
		/* $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Purpose')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $purpose = array();
        foreach ($purposes as $purposeVal) {
            $purpose[$purposeVal->id] = $purposeVal->value;
        } */
		
		$basic = Library::where('userid',$uid)->first();
		$user = User::where('id',$uid)->first();
		$id = $basic->id;
		$contact = LibraryContact::where('libraryid',$id)->first();
		//$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$group  =  Library::where('type','2')->pluck('name', 'id')->all();
		$details  = Librarylogin::where('libraryid',$id)->first();
		
		$ips  = Libraryips::where('libraryid',$id)->get();
		$remoteips  = Libraryremoteip::where('libraryid',$id)->get();
		$purposes = orgpurpose::where('orgid',$id)->first();
		if(!empty($purposes->purposeid)){$purposeId = json_decode($purposes->purposeid);}else{$purposeId = '';}
		
		$logo = Documents::where('userid',$id)->where('filetype',1)->where('type','ORG')->first();
		$doc = Documents::where('userid',$id)->where('filetype',2)->where('type','ORG')->get();
		$photo = Documents::where('userid',$id)->where('filetype',3)->where('type','ORG')->get();
		
		$rolesIds = Usertyperole::where('type','TESt')->first();		
		$roleid = json_decode($rolesIds,TRUE);
		$dataids = $roleid['role_ids'];
		$roles = Role::select('name','id')->whereIn('id', ["8","9"])->get(); 
		
        return view('admin.organization.edit',compact('roles','userroles','language','country','purpose','group','basic','contact','details','ips','remoteips','purposeId','user','logo','doc','photo'));
	}
	
	public function update(Request $request, $uid) 
	{
		$basic = Library::where('userid',$uid)->first();
		$id = $basic->id;
		$this->validate($request, [
					'orgname' => 'required',
					'email' => 'required|email',
					'userrole' => 'required',
					'availability' => 'required',
					/* 'useremail' => 'required|email|unique:users,email,'.$basic->userid, */
					'mobile' => 'numeric',
					'phone' => 'numeric',
				]);
				DB::beginTransaction();
		try {
			$result = $request->all();
				/* print_r($_FILES);
				echo $request->file('logoImg');
				echo $result['logoImg'];exit; */
				$userLog = array(
				"email"  => $result['useremail'],
				"name"  => $result['orgname'],
				"updated_at"  => Now(),
				);
				DB::table('users')->where('id', $uid)->update($userLog);
				
				DB::table('model_has_roles')->where('model_id', $id)->update(
					['role_id' => $result['userrole']]
				);
				
				$basic = array(
                    "name"  => $result['orgname'],
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
				
				 if(!empty($request->file('logoImg')))
				{
					$imageName = time().'.'.request()->logoImg->getClientOriginalExtension();
					request()->logoImg->move(public_path('uploads/images'), $imageName);
					$datalogo = array(
						'userid'=> $id,
						'name'=> $imageName,
						'type'=> 'ORG',
						'filetype'=>1,
						'created_at'=>now(),
					);
					Documents::insert($datalogo);
				} 
				
				
				
				if ($documents = $request->file('documents')) {
					$i = 0;
					foreach ($documents as $files) {
					$destinationPath = 'uploads/images'; // upload path
					
					$profileImage = md5(microtime().$i)."Photo." . $files->getClientOriginalExtension();					
					$files->move($destinationPath, $profileImage);
						 $datadoc = array(
							'userid'=> $id,
							'name'=> $profileImage,
							'type'=> 'ORG',
							'filetype'=>2,
							'created_at'=>now(),
						);
						Documents::insert($datadoc);
					}
				}
				
				if ($photos = $request->file('photos')) {
					$i = 0;
					foreach ($photos as $files) {
					$destinationPath = 'uploads/images'; // upload path
					
					$profileImage = md5(microtime().$i)."Photo." . $files->getClientOriginalExtension();					
					$files->move($destinationPath, $profileImage);
						$dataphoto = array(
							'userid'=> $id,
							'name'=> $profileImage,
							'type'=> 'ORG',
							'filetype'=>3,
							'created_at'=>now(),
						);
						Documents::insert($dataphoto);
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
	
	public function delete($uid)
	{
		try {	
			$basic = Library::where('userid',$uid)->first();
			$id = $basic->id;
			User::where('id', $uid)->delete();
			Library::where('id', $id)->delete();
			LibraryContact::where('libraryid', $id)->delete();
			Libraryremoteip::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			Libraryips::where('libraryid', $id)->delete();
			orgpurpose::where('orgid', $id)->delete();
			
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
	
	public function deleteDataImg(Request $request)
	{
		$doc = Documents::where('id', $request->id)->where('type', $request->txt)->first();
		$destinationPath = 'uploads/images/'. $doc->name;
		unlink($destinationPath);
		Documents::where('id', $request->id)->where('type', $request->txt)->delete();
	}
	
}
