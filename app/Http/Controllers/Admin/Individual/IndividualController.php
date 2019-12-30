<?php

namespace App\Http\Controllers\Admin\Individual;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Individual;
use App\Models\IndividualContact;
use App\Models\IndividualPersonal;
use App\Models\IndividualPerpose;
use App\Models\IndividualStudy;
use App\Models\IndividualCare;
use App\Models\IndividualWalfare;
use App\Models\IndividualResearch;
use App\Models\IndividualProject;
use App\Models\IndividualChildern;
use App\Models\IndividualVideo;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use App\User;

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use App\Models\Purpose;
use DataTables;
use DB;
use Hash;

class IndividualController extends Controller
{
     public function index(Request $request) {

        if ($request->ajax()) {

            $data = Individual::select('id','userid', 'firstname','lastname')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
							$txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/individual/'.$row->userid.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('.$txt.')" href="'.url('admin').'/individual/delete/'.$row->userid.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.Individual.index');
    }
	
	
	
	
	public function create()
    {
		
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$userroles = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
        return view('admin.Individual.create',compact('roles','userroles','language','country','purpose'));
    }
	
	public function store(Request $request)
	{
		$this->validate($request, [
					'firstname' => 'required',
					'lastname' => 'required',
					'availability' => 'required',
					'email' => 'required|email|unique:users,email',
					'mobile' => 'numeric',
					'phone' => 'numeric',
				]);
				DB::beginTransaction();
		try
		{
				$result = $request->all();	

				//userLogin 
				$userLog = array(
				"email"  => $result['email'],
				"name"  => $result['firstname'].' '.$result['lastname'],
				"password"  => $result['dob'],
				"user_type" =>"IND",
				"created_at"  => Now(),
				);
		
				$user_id = User::insertGetId($userLog); 

				DB::table('model_has_roles')->insert(
					['role_id' => $result['userrole'], 'model_type' => 'App\User','model_id' => $user_id]
				);
				
				$dob = date("Y-m-d", strtotime($result['dob']));
				//Individual Basic info
				$basicinfo = array(
				"userid"  => $user_id ,
				"firstname"  =>  $result['firstname'],
				"lastname"  => 	 $result['lastname'],
				"middlename"  => $result['middlename'],
				"age"  =>		 $result['age'],
				"dob"  => 		$dob, 
				"language"  => $result['language'],
				"availability"  => $result['availability'], 
				"created_at"  => Now(),
				);
				
				$indId = Individual::insertGetId($basicinfo);
				
				
				$contactinfo = array(
				"userid"  => $user_id ,
				"streetadress"  => $result['streetaddress'],
				"individualid"  => $indId,
				"zipcode"  => $result['zipcode'],
				"country"  => $result['country'],
				"region"  =>  $result['region'],
				"city"  =>    $result['city'],
				"personal" => $result['personal'],
				"mobile"  =>  $result['mobile'],
				"phone"  =>   $result['phone'],
				"created_at"  => Now(),
				);
				
				IndividualContact::insert($contactinfo);
					
				$personalinfo = array(
				"userid"  => $user_id ,
				"individualid"  => $indId,
				"gender"  => $result['gender'],
				"civilstatus"  => $result['civilstatus'],
				"occupation"  => $result['occupation'],
				"nationality"  => $result['nationality'],
				"residenceregion"  => $result['rregion'],
				"residencecity"  => $result['rcity'],
				"residenceparish"  => $result['rparish'],
				"birthregion"  => $result['bregion'],
				"birthcity"  => $result['bcity'],
				"birthparish"  => $result['bparish'],
				"applicationletter"  => $result['appletter'],
				"created_at"  => Now(),
				);
				
				IndividualPersonal::insert($personalinfo);	
				$purpose = '';					
				if(!empty($result['purposelist']))
				{
					$purpose = json_encode($result['purposelist']);
				}
				$purposelist = array(
					"userid" => $user_id ,
					"individualid"  => $indId,
					"purposeid" => $purpose,
					"created_at"  => Now(),
				);
				//print_r($result);exit;
				//print_r($result);exit;
				//DB::enableQueryLog();
				IndividualPerpose::insert($purposelist);
				//dd(DB::getQueryLog());
				
				if(!empty($result['sgovtsupport']))
				{$sgovt=$result['sgovtsupport'];}else{$sgovt=3;}
				$sdate = date("Y-m-d", strtotime($result['sdate']));
				$edate = date("Y-m-d", strtotime($result['enddate']));
				$study = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"studyfield"  => $result['studyfield'],
					"studydegree"  => $result['degree'],
					"studyschool"  => $result['school'],
					"studylocation"  => $result['location'],
					"studystart"  =>$sdate,
					"studyend"  => $edate,
					"studygovtsupport"  => $sgovt,
					"studypreviousdegree"  => $result['pdegree'],
					"studyprevioulength"  => $result['plength'],
					"studypreviousschool"  => $result['pschool'],
					"studyprevioulocation"  => $result['plocation'],					
					"studyhighschool"  => $result['hschool'],
					"studyhighlocation"  => $result['hlocation'],
					"studyhighotherlocation"  => $result['hotherlocation'],
					"studyhighotherinfo"  => $result['sadditionalinfo'],
					"studyadditionalinfo"  => $result['sadditionalinfo'],
					"created_at"  => Now(),
				);
				//print_r($study);exit;
				//print_r($study);exit;
				IndividualStudy::insert($study);
				
				$care = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"careillness"  => $result['careillness'],
					"caresymptoms"  => $result['caresymptoms'],
					"carehospital"  => $result['carehospital'],
					"carehealthregion"  => $result['carehealthregion'],
					"careaddtionalinfo"  => $result['careaddtionalinfo'],
					"created_at"  => Now(),
				);
				
				IndividualCare::insert($care);
				
				$walfare = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"welfareneeds"  => $result['welfareneeds'],
					"welfareadditionalinfo"  => $result['welfareadditionalinfo'],
					"created_at"  => Now(),
				);
				
				IndividualWalfare::insert($walfare);
				if(!empty($result['researchsubject']))
				{$subjects = $result['researchsubject'];}else{$subjects = null;}
				if(!empty($result['researchgovtsupport']))
				{$rgovt=$result['researchgovtsupport'];}else{$rgovt=3;}
				$rdate = date("Y-m-d", strtotime($result['researchstartdate']));
				$redate = date("Y-m-d", strtotime($result['researchenddate']));
				$research = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"researchsubject"  => $subjects,
					"researchobjective"  => $result['researchobjective'],
					"researchlimitation"  => $result['researchlimitation'],
					"researchadditionalinfo"  => $result['researchadditionalinfo'],
					"researchstartdate"  => $rdate,
					"researchenddate"  =>  $redate,
					"researchgovtsupport"  => $rgovt,
					"researchprevstudy"  => $result['researchprevstudy'],
					"researchprevschool"  => $result['researchprevschool'],
					"researchhighschool"  => $result['researchhighschool'],
					"created_at"  => Now(),
				);
				
				IndividualResearch::insert($research);
				
				
				$project = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"projectobject"  => $result['projectobject'],
					"projectpurpose"  => $result['projectpurpose'],
					"projectgeoarea"  => $result['projectgeoarea'],
					"projectbeneficiries"  => $result['projectbeneficiries'],
					"projectotherinfo"  => $result['projectotherinfo'],
					"created_at"  => Now(),
				);
				
				IndividualProject::insert($project);
				if(!empty($result['videotype']))
				{
					$i =0;
					foreach($result['videotype'] as $type){
					$url = $result['video_url'];
					$video = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"type"  => $type,
					"url"  => $url[$i],
					"created_at"  => Now(),
					);
					IndividualVideo::insert($video);
					$i++; }
				}

				if(!empty($result['videotype']))
				{
					$j =0;
					$gender = $result['cgender'];
					$school = $result['cschool'];
					$location = $result['clocation'];
					foreach($result['cdob'] as $Cdob){
					$childern = array(
					"userid"  => $user_id ,
					"individualid"  => $indId,
					"childerndob"  => $Cdob,
					"childerngender"  => $gender[$j],
					"childernschool"  => $school[$j],
					"childernlocation"  => $location[$j],
					"created_at"  => Now(),
					);
					IndividualChildern::insert($childern);
					$j++; }
				}

			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Individual created")
                            ];
			DB::commit();
			return redirect('admin/individual')->with('message', $output);
		}
		catch (\Exception $e) {
            $output	= ['class' => 'alert-position-danger',
                            'msg' => __("Individual Not create".$e)
                            ];
		DB::rollBack();
		echo $e;
		//return redirect('admin/individual/create')->with('message', $output);
        }
		
	}
	
	
	public function edit($id)
	{
		/* $data = Individual::get(); 
		  $data = Individual::alldata(3);
		echo "<pre>"; print_r($data);exit; */ 
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		//$s = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		$individual = Individual::where('userid',$id)->first();
		$user = User::where('id',$id)->first();
		$userRole = $user->roles->pluck('name','id')->all();
		
		$contact = IndividualContact::where('userid',$id)->first();
		$personal = IndividualPersonal::where('userid',$id)->first();
		$purposes = IndividualPerpose::where('userid',$id)->first();
		if(!empty($purposes->purposeid)){$purposeId = json_decode($purposes->purposeid);}else{$purposeId = '';}
			//print_r($purposeId);exit;		
		/* $purposeId = json_decode($purposes->purposeid); */
		$study = IndividualStudy::where('userid',$id)->first();
		$care = IndividualCare::where('userid',$id)->first();
		$walfare = IndividualWalfare::where('userid',$id)->first();
		$research = IndividualResearch::where('userid',$id)->first();
		$project = IndividualProject::where('userid',$id)->first();
		$video = IndividualVideo::where('userid',$id)->get();
		$childern = IndividualChildern::where('userid',$id)->get();
		/*  echo "<pre>";
		print_r($user);exit; */
		
        return view('admin.Individual.edit',compact('roles','language','country','purpose','individual','user','contact','personal','purpose','purposeId','study','care','walfare','research','project','video','childern','userRole'));
	}

public function update(Request $request, $id) 
{
			$this->validate($request, [
					'firstname' => 'required',
					'lastname' => 'required',
					'availability' => 'required',
					'email' => 'required|email|unique:users,email,'.$id,
					'mobile' => 'numeric',
					'phone' => 'numeric',
				]);
				DB::beginTransaction();
	try {
			$result = $request->all();
			
				$userLog = array(
				"email"  => $result['email'],
				"name"  => $result['firstname'].' '.$result['lastname'],
				"updated_at"  => Now(),
				);
				DB::table('users')->where('id', $id)->update($userLog);
				
				DB::table('model_has_roles')->where('model_id', $id)->update(
					['role_id' => $result['userrole']]
				);
			
				$dob = date("Y-m-d", strtotime($result['dob']));				
				$basicinfo = array(
				"firstname"  =>  $result['firstname'],
				"lastname"  => 	 $result['lastname'],
				"middlename"  => $result['middlename'],
				"age"  =>		 $result['age'],
				"dob"  => 		$dob, 
				"language"  => $result['language'],
				"availability"  => $result['availability'], 
				"updated_at"  => Now(),
				);
				DB::table('individual')->where('userid', $id)->update($basicinfo);
			
				$contactinfo = array(
				
				"streetadress"  => $result['streetaddress'],
				"zipcode"  => $result['zipcode'],
				"country"  => $result['country'],
				"region"  =>  $result['region'],
				"city"  =>    $result['city'],
				"personal" => $result['personal'],
				"mobile"  =>  $result['mobile'],
				"phone"  =>   $result['phone'],
				"updated_at"  => Now(),
				);
				DB::table('individual_contact')->where('userid', $id)->update($contactinfo);
				
				$personalinfo = array(
				
				"gender"  => $result['gender'],
				"civilstatus"  => $result['civilstatus'],
				"occupation"  => $result['occupation'],
				"nationality"  => $result['nationality'],
				"residenceregion"  => $result['rregion'],
				"residencecity"  => $result['rcity'],
				"residenceparish"  => $result['rparish'],
				"birthregion"  => $result['bregion'],
				"birthcity"  => $result['bcity'],
				"birthparish"  => $result['bparish'],
				"applicationletter"  => $result['appletter'],
				"created_at"  => Now(),
				);
				DB::table('individual_personal')->where('userid', $id)->update($personalinfo);
				
				$purpose = '';					
				if(!empty($result['purposelist']))
				{
					$purpose = json_encode($result['purposelist']);
				}
				$purposelist = array(
					"purposeid" => $purpose,
					"updated_at"  => Now(),
				);
				DB::table('individual_purposelist')->where('userid', $id)->update($purposelist);
				
				if(!empty($result['sgovtsupport']))
				{$sgovt=$result['sgovtsupport'];}else{$sgovt=3;}
				$sdate = date("Y-m-d", strtotime($result['sdate']));
				$edate = date("Y-m-d", strtotime($result['enddate']));
				$study = array(
					
					"studyfield"  => $result['studyfield'],
					"studydegree"  => $result['degree'],
					"studyschool"  => $result['school'],
					"studylocation"  => $result['location'],
					"studystart"  =>$sdate,
					"studyend"  => $edate,
					"studygovtsupport"  => $sgovt,
					"studypreviousdegree"  => $result['pdegree'],
					"studyprevioulength"  => $result['plength'],
					"studypreviousschool"  => $result['pschool'],
					"studyprevioulocation"  => $result['plocation'],					
					"studyhighschool"  => $result['hschool'],
					"studyhighlocation"  => $result['hlocation'],
					"studyhighotherlocation"  => $result['hotherlocation'],
					"studyhighotherinfo"  => $result['sadditionalinfo'],
					"studyadditionalinfo"  => $result['sadditionalinfo'],
					"updated_at"  => Now(),
				);
				
				DB::table('individual_study')->where('userid', $id)->update($study);
				
				$care = array(
					
					"careillness"  => $result['careillness'],
					"caresymptoms"  => $result['caresymptoms'],
					"carehospital"  => $result['carehospital'],
					"carehealthregion"  => $result['carehealthregion'],
					"careaddtionalinfo"  => $result['careaddtionalinfo'],
					"updated_at"  => Now(),
				);
				
				DB::table('individual_care')->where('userid', $id)->update($care);
				
				$walfare = array(
				
					"welfareneeds"  => $result['welfareneeds'],
					"welfareadditionalinfo"  => $result['welfareadditionalinfo'],
					"updated_at"  => Now(),
				);
				
				DB::table('individual_welfare')->where('userid', $id)->update($walfare);
				
				if(!empty($result['researchsubject']))
				{$subjects = $result['researchsubject'];}else{$subjects = null;}
				if(!empty($result['researchgovtsupport']))
				{$rgovt=$result['researchgovtsupport'];}else{$rgovt=3;}
				$rdate = date("Y-m-d", strtotime($result['researchstartdate']));
				$redate = date("Y-m-d", strtotime($result['researchenddate']));
				$research = array(
					
					"researchsubject"  =>$subjects,
					"researchobjective"  => $result['researchobjective'],
					"researchlimitation"  => $result['researchlimitation'],
					"researchadditionalinfo"  => $result['researchadditionalinfo'],
					"researchstartdate"  => $rdate,
					"researchenddate"  =>  $redate,
					"researchgovtsupport"  =>$rgovt,
					"researchprevstudy"  => $result['researchprevstudy'],
					"researchprevschool"  => $result['researchprevschool'],
					"researchhighschool"  => $result['researchhighschool'],
					"updated_at"  => Now(),
				);
				
				DB::table('individual_research')->where('userid', $id)->update($research);
				
				
				$project = array(
					
					"projectobject"  => $result['projectobject'],
					"projectpurpose"  => $result['projectpurpose'],
					"projectgeoarea"  => $result['projectgeoarea'],
					"projectbeneficiries"  => $result['projectbeneficiries'],
					"projectotherinfo"  => $result['projectotherinfo'],
					"updated_at"  => Now(),
				);				
				DB::table('individual_project')->where('userid', $id)->update($project);
			
				
				if(!empty($result['videotype']))
				{
					IndividualVideo::where('userid', $id)->delete();
					$i =0;
					foreach($result['videotype'] as $type){
					$url = $result['video_url'];
					
					$video = array(
					"userid"  => $id,
					"type"  => $type,
					"url"  => $url[$i],
					"updated_at"  => Now(),
					);
					IndividualVideo::insert($video);
					$i++; }
				}
				
				
				if(!empty($result['videotype']))
				{
					IndividualChildern::where('userid', $id)->delete();
					$j =0;
					$gender = $result['cgender'];
					$school = $result['cschool'];
					$location = $result['clocation'];
					foreach($result['cdob'] as $Cdob){
					$childern = array(
					"userid"  => $id ,
					"childerndob"  => $Cdob,
					"childerngender"  => $gender[$j],
					"childernschool"  => $school[$j],
					"childernlocation"  => $location[$j],
					"updated_at"  => Now(),
					);
					IndividualChildern::insert($childern);
					$j++; }
				}
			$output	= ['class' => 'alert-position-success',
						'msg' => __("Individual updated")
						];
			DB::commit();
		return redirect('admin/individual')->with('status', $output);
		} catch (\Exception $e) {
            $output	= ['class' => 'alert-position-danger',
                            'msg' => __("Individual Not updated".$e)
                            ];
		DB::rollBack();
		//echo $e;
		return redirect('admin/individual')->with('status', $output);
		}

		
}
	
	
	
	public function delete($id)
	{
		try {			
			Individual::where('userid', $id)->delete();
			IndividualContact::where('userid', $id)->delete();
			IndividualPersonal::where('userid', $id)->delete();
			IndividualPerpose::where('userid', $id)->delete();
			IndividualStudy::where('userid', $id)->delete();
			IndividualCare::where('userid', $id)->delete();
			IndividualWalfare::where('userid', $id)->delete();
			IndividualResearch::where('userid', $id)->delete();
			IndividualProject::where('userid', $id)->delete();
			IndividualChildern::where('userid', $id)->delete();
			IndividualVideo::where('userid', $id)->delete();
			User::where('id', $id)->delete();
			
			$output = ['success' => true,
						'msg' => __("Module Field Deleted")
						];
		} catch (\Exception $e) {
		
			$output = ['success' => false,
						'msg' => __("messages.something_went_wrong")
					];
		}

		return redirect('admin/individual')->with('status', $output);
	}
	
	
	public function getregion(Request $request)
	{
		$region = Region::where('country_id',$request->cid)->get();
		$data = '';
		$data .= '<option value="0">select region</option>';
		if($region)
		{
			foreach($region as $reg)
			{
				$data .= '<option value="'.$reg->id.'">'.$reg->region_name.'</option>';
			}
		}
		echo $data;
	}
	
	public function getcity(Request $request)
	{
		$city = City::where('region_id',$request->cid)->get();
		$data = '';
		$data .= '<option value="0">select city</option>';
		if($city)
		{
			foreach($city as $reg)
			{
				$data .= '<option value="'.$reg->id.'">'.$reg->city_name.'</option>';
			}
		}
		echo $data;
	}
	
	
}
