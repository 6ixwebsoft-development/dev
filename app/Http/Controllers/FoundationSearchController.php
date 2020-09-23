<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\City;
use App\Models\Country;
use App\Models\CountryBlock;
use App\Models\Foundation;
use App\Models\FoundationAdvertise;
use App\Models\FoundationAge;
use App\Models\FoundationApplication;
use App\Models\FoundationContact;
use App\Models\FoundationDates;
use App\Models\FoundationGender;
use App\Models\FoundationInstructions;
use App\Models\FoundationLocation;
use App\Models\FoundationPurpose;
use App\Models\FoundationSaveCount;
use App\Models\FoundationSubject;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Models\Modules;
use App\Models\Region;
use App\Models\SearchCount;
use App\Models\UserSearchSave;
use App\Models\Visit;
use App\User;
use DB;
use DataTables;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class FoundationSearchController extends Controller
{
    use HasRoles;

    protected $guard_name = 'web';

    public function __construct()
    {		
        //$this->middleware('SetSessionData');
    }


    public function index(Request $request) {        
        //$userId = $request->session()->get('user.userId');
		
        $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        }
        
        $genders = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Gender')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $gender = array();
        foreach ($genders as $genderVal) {
            $gender[$genderVal->id] = $genderVal->value;
        }

        $subjects = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subject')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        
        $subject = array();
        foreach ($subjects as $subjectVal) {
            $subject[$subjectVal->id] = $subjectVal->value;
        }

        $cities = City::where('status', 1)->get();

        $city = array();
        foreach ($cities as $citi) {
            $city[$citi->id] = $citi->city_name;
        }
        /* print_r($cities);exit; */
        return view('foundation-search')->with(compact('purpose', 'gender', 'subject', 'city'));
    }

    public function simpleSearchResult(Request $request)
    {
        $cityIds = $request->city_ids;
        
        $foundation_idss = $request->favourite_fund_ids;
        $is_fav = false;
		if(!empty($foundation_idss)){
            $is_fav = true;
        }
		// echo "<pre>";
       
        // // print_r($foundation_ids);
        // $d = Foundation::find(7)->age;
        // foreach ($d as $row) {
        //     print_r($d);
        // }
        // print_r($d);
        // die('asdgsdg');
        //if ($request->ajax()) {
            
            $user = Auth::user();
            
            if($user) {
                $roles = $user->getRoleNames(); 
                $permissions = $user->getPermissionsViaRoles();
            } else {
                //User00 - Anonymous user
                $role = Role::findByName('User00 - Anonymous user');
                //print_r($role);
                $permissions = $role->getAllPermissions();
            }

            //$cityIds = $request->get('city_ids');

            //$cityName   = $request->get('cityName');
            // $d = Foundation::find(6)->age;
            // //print_r($d);
            // die();
            $limit = 0;
            $foundation = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                        ->leftjoin('gg_foundation_location as fl', 'gg_foundation.id', 'fl.foundation_id')
                        ->leftjoin('gg_foundation_purpose as fp', 'gg_foundation.id', 'fp.foundation_id')
                        ->leftjoin('gg_city as ct', 'fl.city_id', 'ct.id')
                        ->leftjoin('gg_country as cn', 'fl.country_id', 'cn.id')
                        ->leftjoin('gg_search_count as sc', 'gg_foundation.id', 'sc.foundation_id')
                        ->select(
                            "gg_foundation.id",
                            "name",
                            "sort",
                            "administrator",
                            "asset",
                            "source",
                            "org_no",
                            "remarks",
                            "fa.who_can_apply",
                            "fa.purpose",
                            "fa.details",
                            "fa.misc",
                            "ct.city_name",
                            "cn.country_name"
                        )
                        ->orderBy('sc.count',  'desc');
                        /* ->whereIn('fp.param_id', array(2, 4)) */
                       /*  ->where('cn.id', 1); */ 

            //as stated in GG40-66
            //if (!empty($purposeIds)) {
                $foundation->leftjoin('gg_foundation_purpose as fpur', 'gg_foundation.id', 'fpur.foundation_id');
                $foundation->whereIn('fpur.param_id', [52,125]);
            //}
            if (!empty($cityIds)) {
                $foundation->whereIn('fl.city_id', $cityIds);
            }

            // if (!empty($foundation_ids)) {
            //     $foundation->whereIn('gg_foundation.id', $foundation_ids);
            // } 

            //$data = $foundation->distinct()->get();

            $foundation_contacts = array();
            foreach ($permissions as $permission) {
                $permisionSets = explode("-", $permission->name);
                if(sizeof($permisionSets) >= 3) {
                    $no_subscriber = $permisionSets[0]. '-' .$permisionSets[1];
                    if($no_subscriber == 'no-subscriber') {
                        $limit = $permisionSets[2];
                    }

                    /*$permisionSet  = $permisionSets[0]. '-' .$permisionSets[1]. '-' .$permisionSets[2];
                    if($permisionSet == 'foundation-view-contact') {
                        if(isset($permisionSets[3])) {
                            $count = $permisionSets[3];
                            $i = 0;
                            foreach ($all_foundations as $foundation) {
                                if($i < $count) {
                                    $contacts = FoundationContact::where('foundation_id', $foundation->id)->get();
                                    $foundation_contacts[$i] = $contacts;
                                } 
                                $i++;
                            }
                        } else {
                            foreach ($all_foundations  as $key => $foundation) {
                                $contacts = FoundationContact::where('foundation_id', $foundation->id)->get();
                                    $foundation_contacts[$key] = $contacts;
                            }

                        }
                    }*/
                }
            }
			
        //}
		
        $fund_count = $foundation->get()->unique()->count();
        $save_count = array();
        if($user) {
            $fund_saved = UserSearchSave::where('user_id', $user->id)->get()->unique();
            foreach ($fund_saved as $fund_save) {
                $save_count[] = $fund_save->foundation_id;
            }

            $all_foundations = $foundation->get()->unique();       

        }elseif(!empty(Session::get('remote_name'))){
			 $all_foundations = $foundation->get()->unique();  
		}elseif(!empty(Session::get('checkip'))){			 
			$all_foundations = $foundation->get()->unique();  		
		}else {

            if($limit > 0) {

                if($fund_count > 10 ) {
                    $all_foundations = $foundation->limit($limit)->get()->unique();  

                } else {
                    $count_half = floor($fund_count / 2);
                    $all_foundations = $foundation->limit($count_half)->get()->unique(); 
                }

            } else {
                $all_foundations = array();
            }
        }
		
		// if(empty($cityIds)) {
		// 	if(empty($foundation_ids))
		// 		{
		// 			 $all_foundations = array();
		// 		}
  //           } 
		
        //return response()->json(array("foundations" => $all_foundations, "foundations_contacts" => $foundation_contacts));
		
		//print_r($all_foundations);exit;
        return view('simple-search-result')->with(compact('is_fav','all_foundations', 'fund_count', 'save_count'));
    }

    /* public function loadMore(Request $request) {
        if ($request->ajax()) {

            $id = $request->get('foundation_id');
            $purposeIds = $request->get('purpose_ids');
            $cityName   = $request->get('cityName');
            
            $foundation = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                        ->leftjoin('gg_foundation_location as fl', 'gg_foundation.id', 'fl.foundation_id')
                        ->leftjoin('gg_city as ct', 'fl.city_id', 'ct.id')
                        ->leftjoin('gg_country as cn', 'fl.country_id', 'cn.id')
                        ->select(
                            "gg_foundation.id",
                            "name",
                            "sort",
                            "administrator",
                            "asset",
                            "source",
                            "org_no",
                            "remarks",
                            "fa.who_can_apply",
                            "fa.purpose",
                            "fa.details",
                            "fa.misc",
                            "ct.city_name",
                            "cn.country_name"
                        )
                        ->where('cn.id', 1)
                        ->where('gg_foundation.id', '>', $id);
            
            
            if (!empty($purposeIds)) {
                $foundation->leftjoin('gg_foundation_purpose as fp', 'gg_foundation.id', 'fp.foundation_id');
                $foundation->whereIn('param_id', $purposeIds);
            }
            if (!empty($cityName)) {
                $foundation->where('ct.city_name', 'like', $cityName.'%');
            }

            $data = $foundation->limit(10)->get();
            
            $user = Auth::user();

            /*$foundation_contacts = array();
            if($user) {

                $i = 10;
                foreach ($data as $foundation) {
                    $contacts = FoundationContact::where('foundation_id', $foundation->id)->get();
                    $foundation_contacts[$foundation->id] = $contacts;
                    $i++;
                }

            }*/
       /*  }
        return response()->json($data);
    }  */

    public function getFoundationDetails(Request $request) {
        if ($request->ajax()) {
            
            $foundationIds = $request->get('foundation_ids');
            $contact_details = array();
            
            if($foundationIds) {    
                $foundations = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                            ->leftjoin('gg_foundation_contact as gc', 'gg_foundation.id', 'gc.foundation_id')
                            ->select(
                                "gg_foundation.id",
                                "name",
                                "sort",
                                "administrator",
                                "asset",
                                "source",
                                "org_no",
                                "remarks",
                                "fa.who_can_apply",
                                "fa.purpose",
                                "fa.details",
                                "fa.misc",
                                "gc.phone_no",
                                "gc.mobile_no",
                                "gc.email",
                                "gc.website",
                                "gc.address1",
                                "gc.address2",
                                "gc.address3"
                            )
                            ->whereIn('gg_foundation.id', $foundationIds)
                            ->get();
                $html = '';
                foreach ($foundations as $key => $foundation) {
                    $html = '<p><b>Purpose: </b>'.$foundation->purpose.'</p>
                            <p><b>Who Can Apply: </b>'.$foundation->who_can_apply.'</p>
                            <p><b>Applications: </b>'.$foundation->details.'</p>
                            <p><b>Contact Details:</b></p>
                            <p>'.$foundation->address1.'</p><p>'.$foundation->address2.'</p><p>'.$foundation->address3.'</p><br>
                            <p>PHONE: '.$foundation->phone_no.'</p><p>MOBILE: '.$foundation->mobile_no.'</p><p>E_MAIL: '.$foundation->email.'</p><p>Website: <a href="'.$foundation->website.'" target="blank">'.$foundation->website.'</a></p><p class="border"></p>';
                    $contact_details[$key] = $html;
                }
            } 

        }
        return response()->json($contact_details);
    } 


    public function getFoundationDetail($id) {	
        if ($id) {

            $foundation_details = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                            ->leftjoin('gg_foundation_contact as gc', 'gg_foundation.id', 'gc.foundation_id')
                            ->select(
                                "gg_foundation.id",
                                "name",
                                "sort",
                                "administrator",
                                "asset",
                                "source",
                                "org_no",
                                "remarks",
                                "fa.who_can_apply",
                                "fa.purpose",
                                "fa.details",
                                "fa.misc",
                                "gc.phone_no",
                                "gc.mobile_no",
                                "gc.email",
                                "gc.website",
                                "gc.address1",
                                "gc.address2",
                                "gc.address3"
                            )
                            ->where('gg_foundation.id', $id)
                            ->get();
        }
		/* print_r($foundation_details);exit; */
        return view('foundation-detail')->with(compact('foundation_details'));
    } 
	
	
	public function getFoundationDetailAjax(Request $request) {
		//	print_r($request->all());exit;
			$id = $request->foundationId;
			$nextid = $request->nextid;
			$previd = $request->previd;
        if ($id) {
            $foundation_details = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                            ->leftjoin('gg_foundation_contact as gc', 'gg_foundation.id', 'gc.foundation_id')
                            ->select(
                                "gg_foundation.id",
                                "name",
                                "sort",
                                "administrator",
                                "asset",
                                "source",
                                "org_no",
                                "remarks",
                                "fa.who_can_apply",
                                "fa.purpose",
                                "fa.details",
                                "fa.misc",
                                "gc.phone_no",
                                "gc.mobile_no",
                                "gc.email",
                                "gc.website",
                                "gc.address1",
                                "gc.address2",
                                "gc.address3"
                            )
                            ->where('gg_foundation.id', $id)
                            ->get();
        }
		/* print_r($foundation_details);exit; */
		$ajax = array(
			'ajax' => true,
		);
        $hide_name = $request->hide_name;
        return view('foundation-detailajax')->with(compact('foundation_details','ajax','nextid','previd','hide_name'));
    }


    //advance search
    public function advanceSearch_old(Request $request) {
        if ($request->ajax()) {
        }
        $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        }
        
        $genders = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Type of applicant')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $gender = array();
        foreach ($genders as $genderVal) {
            $gender[$genderVal->id] = $genderVal->value;
        } 
		
        $subjects = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subject')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        
        $subject = array();
        foreach ($subjects as $subjectVal) {
            $subject[$subjectVal->id] = $subjectVal->value;
        }
		
		$cities = City::where('status', 1)->get();
		 $city = array();
        foreach ($cities as $citi) {
            $city[$citi->id] = $citi->city_name;
        }
		
        return view('advance-search')->with(compact('purpose', 'gender', 'subject','city'));
    }

    
	public function getAdvanceFoundations_old(Request $request)
    {
        if ($request->ajax()) {
			
			//echo "<pre>";
			parse_str($request->post('data'), $data);
			//print_r($data['keywords']);exit;
            $purposeIds = $request->get('purpose_ids');
            $genderIds  = $request->get('gender_ids');
			$foundids   = $request->get('foundids'); 
			$keywords   = $data['keywords'];
			if(!empty($data['subject_ids'])){
				$subjectIds = $data['subject_ids'];//$request->get('subject_ids');
			}
           
            $cityName   = $request->get('cityName'); 
			$hide_records   = "Inactive";
			if(!empty($data['hide_records'])){
				$hide_records   = $data['hide_records'];
			}
			
			if(!empty($data['only_active'])){
				$only_active   = $data['only_active'];
			}
			

            $foundation = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
                        ->leftjoin('gg_foundation_location as fl', 'gg_foundation.id', 'fl.foundation_id')
                        ->leftjoin('gg_city as ct', 'fl.city_id', 'ct.id')
                        ->leftjoin('gg_country as cn', 'fl.country_id', 'cn.id')
                        ->select(
                            "gg_foundation.id",
                            "name",
                            "sort"
                           /*  "cn.country_name" */
                        );
                        //->where('cn.country_name', 'like', 'Sweden%');
            
			if(empty($foundids))
			{
			   if (!empty($purposeIds)) {
					$foundation->leftjoin('gg_foundation_purpose as fp', 'gg_foundation.id', 'fp.foundation_id');
					$foundation->whereIn('fp.param_id', $purposeIds);
				}
				
				if (!empty($genderIds)) {
					$foundation->leftjoin('gg_foundation_gender as fg', 'gg_foundation.id', 'fg.foundation_id');
					$foundation->WhereIn('fg.param_id', $genderIds);
				}
				if (!empty($subjectIds)) {
					$foundation->leftjoin('gg_foundation_subject as fs', 'gg_foundation.id', 'fs.foundation_id');
					$foundation->WhereIn('fs.param_id', $subjectIds);
				}

				if (!empty($cityName)) {
					$foundation->WhereIn('ct.id', $cityName);
				}
				
				if(!empty($hide_records)) {
					if($hide_records == 1){
						$foundation->where('gg_foundation.language', 2);
					}
				}
				
				if(!empty($keywords)) {
					$seachtext = explode(",",$keywords);
					foreach($seachtext as $searchTerm){
					$foundation->orwhere(function($q) use ($searchTerm){
						$q->where('gg_foundation.name', 'like', '%'.$searchTerm.'%')
						->orWhere('gg_foundation.sort', 'like', '%'.$searchTerm.'%')
						->orWhere('fa.who_can_apply', 'like', '%'.$searchTerm.'%')
						->orWhere('fa.purpose', 'like', '%'.$searchTerm.'%')
						->orWhere('fa.details', 'like', '%'.$searchTerm.'%');
						});
					}
				}
				
				if(!empty($only_active)) {
					if($only_active == 1){
						 $foundation->where('gg_foundation.status', 'Active');
					}
				}
			}else{
				$foundations = explode(",",$foundids);
				$foundation->WhereIn('gg_foundation.id', $foundations);
			}
            //$data = $foundation->distinct()->get();
			//DB::enableQueryLog();
            $data = $foundation->distinct()->limit(1000)->get();
            //check user for contact show 
			//dd(DB::getQueryLog());
            $user = Auth::user();
            $foundation_contacts = array();

          /*   if($user) {
                $roles = $user->getRoleNames(); 
                $permissions = $user->getPermissionsViaRoles();

                foreach ($permissions as $permission) {
                    $permisionSets = explode("-", $permission->name);
                    if(sizeof($permisionSets) >= 3) {
                        
                        $permisionSet  = $permisionSets[0]. '-' .$permisionSets[1]. '-' .$permisionSets[2];
                        if($permisionSet == 'foundation-view-contact') {
                            if(isset($permisionSets[3])) {
                                $count = $permisionSets[3];
                                $i = 0;
                                foreach ($data as $foundation) {
                                    if($i < $count) {
                                        $contacts = FoundationContact::where('foundation_id', $foundation->id)->get();
                                        $foundation_contacts[$i] = $contacts;
                                    } 
                                    $i++;
                                }
                            } else {
                                foreach ($data  as $key => $foundation) {
                                    $contacts = FoundationContact::where('foundation_id', $foundation->id)->get();
                                        $foundation_contacts[$key] = $contacts;
                                }

                            }
                        }
                    }
                }
            } */

		 return Datatables::of($data)
				->addIndexColumn()
				->escapeColumns([])
				/* ->addColumn('action', function($row){
				   $btn = '<button onclick="getFoundationDetailajax('.$row->id.',0)">Details</button>';
					return $btn;
				})
				->rawColumns(['action']) */
				->addColumn('checkbox', function($row){
   
                          //$btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="'.$row->id.'">';
                                   
                            return $btn='';
                    }) 
				->addColumn('Total Saved', function($row){
						  
						$btn = UserSearchSave::getFoundationCount($row->id);     
						return $btn;
                    })
				->addColumn('Savedbyuser', function($row){
						  
                        $btn = UserSearchSave::countFoundationSavedByUser($row->id);
                        return $btn;
                    })
					
				->addColumn('Savedbystaff', function($row){
						  
                        $btn = UserSearchSave::countFoundationSavedByStaff($row->id,'staff');
						return $btn;
                    })
					
				->addColumn('id', function($row){
                        $btn = '<a onclick="getFoundationDetailajax('.$row->id.',0)">'.$row->id.'</a>';
						return $btn;
                    })
				->make(true);
        /* print_r($data);exit;
        return response()->json(array("foundations" => $data, "foundations_contacts" => $foundation_contacts)); */
    }
}
    public function autocomplete(Request $request)
    {
        if($request->ajax())
        {
           
            $result=DB::table('gg_city')
                ->where("city_name","LIKE","%{$request->input('query')}%")->select("city_name")
                ->get();
            foreach ($result as $name)
            {
                $data[] = $name->city_name;
            }
            return response()->json($data); 
        }
    }
	
	public function advanceSearch($all_data='') {
        $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        }
        
        $genders = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Type of applicant')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $gender = array();
        foreach ($genders as $genderVal) {
            $gender[$genderVal->id] = $genderVal->value;
        } 
		
        $subjects = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subject')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        
        $subject = array();
        foreach ($subjects as $subjectVal) {
            $subject[$subjectVal->id] = $subjectVal->value;
        }
		
		$cities = City::where('status', 1)->get();
		 $city = array();
        foreach ($cities as $citi) {
            $city[$citi->id] = $citi->city_name;
        }
		//echo Session::get('checkip');exit;
		$checkip = Session::get('checkip'); 
		//  echo "<pre>";
		// print_r($all_data['postdata']);exit;  
		//$user = Auth::user();
        // if($user) {
        //         $roles = $user->roles->pluck('id')->toArray(); 
        //         //$permissions = $user->getPermissionsViaRoles();
        // } else {
        //     //User00 - Anonymous user
        //     $roles[] = Role::findByName('User00 - Anonymous user')->id;
        //     //print_r($role);
        //     //$permissions = $role->getAllPermissions();
        // }
        //dd($all_data);
        $show_l = 0;
        if(!empty($all_data)){
            $show_l = show_search_list($all_data['countdata']);
        }
        if(!empty($all_data['show'])){
            $max_show = $all_data['show'];
        }
        //$max_page = 0;
        //if(!empty($all_data['max_page'])){
            $max_page = $all_data['max_page']+2;
        //}
        $max_limit = get_setting('SHOW_NUM_SEARCH_ADVANCE');
        $perpage = get_setting('SHOW_PER_PAGE_SEARCH_ADVANCE');
        

		return view('advance-search')->with(compact('max_show','max_page','max_limit','purpose', 'gender', 'subject','city','all_data','checkip','roles','show_l'));
    }

    public function advanceSearchdata(Request $request)
    {
        $max_limit = get_setting('SHOW_NUM_SEARCH_ADVANCE');
        $perpage = get_setting('SHOW_PER_PAGE_SEARCH_ADVANCE');
        mysql_strict(false);
		//print_r($request->all());exit;
		$post_data = $request->all();
		//parse_str($request->post('data'), $data);
		//print_r($post_data);exit;
		$purposeIds = $request->purpose_ids;
		$genderIds  = $request->gender_ids;
		$foundids   = $request->foundids; 
		$keywords   = $request->keywords;

		if(!empty($request->subject_ids)){
			$subjectIds = $request->subject_ids;//$request->get('subject_ids');
		}

		$cityName   = $request->location; 

		if(!empty($data['only_active'])){
			$only_active   = $request->only_active;
		}
        DB::enableQueryLog();
			
			$foundation = Foundation::leftjoin('gg_foundation_advertise as fa', 'gg_foundation.id', 'fa.foundation_id')
				->select(
					"gg_foundation.id",
					"name",
					"sort",
                    "remarks"               
				);
				
			if(empty($foundids))
			{
				// if(!empty($keywords)) {
				// 	$seachtext = explode(",",$keywords);
				// 	foreach($seachtext as $searchTerm){
				// 	$foundation->orwhere(function($q) use ($searchTerm){
				// 		$q->where('gg_foundation.name', 'like', '%'.$searchTerm.'%')
				// 		->orWhere('gg_foundation.sort', 'like', '%'.$searchTerm.'%')
				// 		->orWhere('fa.who_can_apply', 'like', '%'.$searchTerm.'%')
				// 		->orWhere('fa.purpose', 'like', '%'.$searchTerm.'%')
				// 		->orWhere('fa.details', 'like', '%'.$searchTerm.'%');
				// 		});
				// 	}
				// }elseif(!empty($cityName)) {
				// 		if (!empty($cityName)) {
				// 			$foundation->leftjoin('gg_foundation_location as fl', 'gg_foundation.id', 'fl.foundation_id')
				// 			 ->leftjoin('gg_city as ct', 'fl.city_id', 'ct.id');
				// 			$foundation->WhereIn('ct.id', $cityName);
				// 		}
				
				// }else {
						if (!empty($purposeIds)) {
							$foundation->leftjoin('gg_foundation_purpose as fp', 'gg_foundation.id', 'fp.foundation_id');
							$foundation->whereIn('fp.param_id', $purposeIds);
						}
						
						if (!empty($genderIds)) {
							$foundation->leftjoin('gg_foundation_gender as fg', 'gg_foundation.id', 'fg.foundation_id');
							$foundation->WhereIn('fg.param_id', $genderIds);
						}
						if (!empty($subjectIds)) {
							$foundation->leftjoin('gg_foundation_subject as fs', 'gg_foundation.id', 'fs.foundation_id');
							$foundation->WhereIn('fs.param_id', $subjectIds);
						}

						if (!empty($cityName)) {
							$foundation->leftjoin('gg_foundation_location as fl', 'gg_foundation.id', 'fl.foundation_id')
							 ->leftjoin('gg_city as ct', 'fl.city_id', 'ct.id');
							$foundation->WhereIn('ct.id', $cityName);
						}
				//}
			}else{
				$foundations = explode(",",$foundids);
				$foundation->WhereIn('gg_foundation.id', $foundations);
			}
			
			if(!empty($request->only_active)) {
				if($request->only_active == 1){
					 $foundation->where('gg_foundation.status', 'Active');
				}
			}

			if(!empty($request->only_lang)){
                $foundation->where('gg_foundation.language', $request->only_lang);
            }


			$foundation->where('gg_foundation.deleted','0');

            
            $countdata = $foundation->count();

            $foundation->groupBy('gg_foundation.id')->get();

            $foundation->orderBy('id','desc');


            
			
            // $page = 50;
            // $n_oage = 50/$countdata;
            //$max_limit

            

			//dd(DB::getQueryLog());
            //$foundation->take(10);
            //$of= 0;
            
            //$foundation->skip($of);
            $data = $foundation->paginate($perpage);
            
            //dd(DB::getQueryLog());

            mysql_strict(true);


            $pagination = $data->appends(request()->except('page'))->render();
            $max_page = 0;
            $max_page = ceil($max_limit/$perpage);
            $sh = fmod($max_limit,$perpage);
            $show = $perpage;
            if(!empty($request->get('page'))){
                //die();
                if($max_page < $request->get('page')){
                    $data = [];
                    $pagination = "";
                }elseif($max_page == $request->get('page')){
                    $show = $sh;
                }

                
                
            }

            if($countdata > $max_limit){
                //echo $max_limit;
                $countdata = $max_limit;
                //die();
            }

            //dd(count($data));
            //
            // $perPage = 20;

            // $currentPage = 1;

            // if ($currentPage == 1) {
            //     $start = 0;
            // }
            // else {
            //     $start = ($currentPage - 1) * $perPage;
            // }

            // $currentPageCollection = $collection->slice($start, $perPage)->all();

            // $paginatedTop100 = new LengthAwarePaginator($currentPageCollection, count($collection), $perPage);

            // $paginatedTop100->setPath(LengthAwarePaginator::resolveCurrentPath());

            // dd($paginatedTop100);
            //





			$founddata = array();
            $hide = false;

            if(Auth::check() && (auth()->user()->is('User30') || auth()->user()->is('User10'))){
                $hide = true;
            }

            //print_r($request->all());exit;

			foreach($data as $fdata){
                $fname = (!$hide)? $fdata->name:"<hidden>";
				$founddata[] = array(
					'id' => $fdata->id,
					'name' => $fname,
					// 'totalsaved' => UserSearchSave::getFoundationCount($fdata->id),
					// 'savedbyuser' => UserSearchSave::countFoundationSavedByUser($fdata->id),
					// 'savedbystaff' => UserSearchSave::countFoundationSavedByStaff($fdata->id),
                    'views' => Visit::getVisits($fdata->id,'total'),
                    'remarks' => $fdata->remarks
				);
			}

			$all_data['data']=$founddata;
			$all_data['links']=$pagination;
			$all_data['postdata']=$post_data;
			$all_data['countdata']=$countdata;
            $all_data['max_page']=$max_page;
            $all_data['show']=$show;
            
            
			// echo "<pre>";
   //          echo "111";
			// print_r($all_data);exit;
			// echo "222";
			return $this->advanceSearch($all_data);	
	}

    	

}