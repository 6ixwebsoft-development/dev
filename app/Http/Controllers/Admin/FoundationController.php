<?php

namespace App\Http\Controllers\Admin;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
//foundation models
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

use App\Models\gender;
use App\Models\Purpose;
use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use App\Models\Subject;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class FoundationController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {
		 /* $data = Foundation::select('id', 'name', 'sort')->get(); */
		/*  $data = Foundation::alldata(5730);
		echo "<pre>"; print_r($data);exit; */

        if ($request->ajax()) {

            $data = Foundation::select('id', 'name', 'sort')->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/foundation/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/foundation/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.foundation.index');
    }

    public function create(Request $request) {

       /*  $purposes = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        
        /* $genders = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        } */
		
		

       /*  $subjects = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        } */

        $months = array(
                    "1"  => "Jan",
                    "2"  => "Fab",
                    "3"  => "Mar",
                    "4"  => "Apr",
                    "5"  => "May",
                    "6"  => "Jun",
                    "7"  => "Jul",
                    "8"  => "Aug",
                    "9"  => "Sep",
                    "10" => "Oct",
                    "11" => "Nov",
                    "12" => "Dec"
            );

        //country block
        $blocks = CountryBlock::select('id', 'name')->get();
        $blocks_arr = array();
        $blocks_arr[0] = 'Select';
        foreach ($blocks as $block) {
            $blocks_arr[$block->id] = $block->name;
        }

        //countries
        $countries = Country::select('id', 'country_name')->get();
        $country_arr = array();
        $country_arr[0] = 'Select';
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }

        //region
        $regions = Region::select('id', 'region_name')->get();
        $region_arr = array();
        $region_arr[0] = 'Select';
        foreach ($regions as $region) {
            //$region_arr[$region->id] = $region->region_name;
        }

        //city 
        $cities = City::select('id', 'city_name')->get();

        $city_arr = array();
        $city_arr[0] = 'Select';
        foreach ($cities as $city) {
            //$city_arr[$city->id] = $city->city_name;
        }
		$purpose = Purpose::pluck('purpose', 'id')->all();	
		$gender = gender::pluck('name', 'id')->all();	
		$subject = Subject::pluck('name', 'id')->all();	
		
        return view('admin.foundation.create')->with(compact('purpose', 'gender', 'subject', 'months', 'blocks_arr', 'country_arr', 'region_arr', 'city_arr'));
    }

    public function store(Request $request)
    { DB::beginTransaction();
        try {
            $result = $request->all();
           // print_r($result);exit;
            //Foundation 
            $foundation = array(
                    "user_id" => 1,
                    "sort"  => $result['sort_name'],
                    "name"  => $result['name'],
                    "administrator"  => $result['admin'],
                    "status"  => $result['status'],
                    "asset"  => $result['asset'],
                    "source"  => $result['source'],
                    "language"  => $result['language_id'],
                    "type"  => $result['type'],
                    "org_no"  => $result['org_no'],
                    "remarks"  => $result['remarks']
            );

            $foundation_id = Foundation::insertGetId($foundation);
            //Foundation Contact
            $contact = array(
                    "foundation_id" => $foundation_id,
                    "phone_no" => $result['phone'],
                    "mobile_no"  => $result['mobile'],
                    "email"  => $result['email'],
                    "website"  => $result['website'],
                    "address1"  => $result['address_1'],
                    "address2"  => $result['address_2'],
                    "address3"  => $result['address_3'],
                    "zip"  => $result['zipcode'],
                    "c_name"  => $result['c_name'],
                    "c_phone_no"  => $result['c_phone'],
                    "c_mobile_no"  => $result['c_mobile'],
                    "c_address"  => $result['c_address'],
                    "c_email"  => $result['c_email']
            );
            FoundationContact::insert($contact);

            //Foundation Location 
			if(!empty($result['country_block'])){
				$i =0;
				foreach($result['country_block'] as $countryblock){
					 $country = $result['country_block'];
					 $region = $result['region'];
					 $city = $result['city'];
					 $parish = $result['parish'];
					 
					$location = array(
							"foundation_id" => $foundation_id,
							"nation_id"  => $countryblock[$i],
							"country_id"  =>  $country[$i],
							"region_id"  => $region[$i],
							"city_id"  => $city[$i],
							"parish"  => $parish[$i]
					);
					FoundationLocation::insert($location);
				} 
				$i++;
			}
            //Foundation Purpose
			if(!empty($result['purpose_ids'])){
				foreach ($result['purpose_ids'] as $purpose_id) {
					$purpose = array(
							"foundation_id" => $foundation_id,
							"param_id" => $purpose_id
					);
					FoundationPurpose::insert($purpose);
				}
			}

            //Foundation Gender
			if(!empty($result['gender_ids'])){
				foreach ($result['gender_ids'] as $gender_id) {
					$gender = array(
							"foundation_id" => $foundation_id,
							"param_id" => $gender_id
					);
					FoundationGender::insert($gender);
				}
			}

            //Foundation Subject
			if(!empty($result['subject_ids'])){
				foreach ($result['subject_ids'] as $subject_id) {
					$subject = array(
							"foundation_id" => $foundation_id,
							"param_id" => $subject_id
					);
					FoundationSubject::insert($subject);
				}
			}

            //Foundation AGE
			
			if(!empty($result['age_from'])){
				$i =0;
				foreach($result['age_from'] as $agef){
					$aget = $result['age_from'];
					$age = array(
							"foundation_id" => $foundation_id,
							"from"  => $agef,
							"to"  => $aget[$i]
					);
					FoundationAge::insert($age);
					$i++;
				}
			}
            //Foundation Start dates
            $dates = array(
                    "foundation_id" => $foundation_id,
                    "start_month"  => $result['apply_start_month'],
                    "start_day"  => $result['apply_start_day'],
                    "end_month"  => $result['apply_end_month'],
                    "end_day"  => $result['apply_end_day']
            );
            FoundationDates::insert($dates);

            //Foundation Advertise
            $f_advertise = array(
                    "foundation_id" => $foundation_id,
                    "who_can_apply"  => $result['who_can_apply'],
                    "purpose"  => $result['purpose_detail'],
                    "details"  => $result['application_details'],
                    "misc"  => $result['misc']
            );
            FoundationAdvertise::insert($f_advertise);
			DB::commit();
            $output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
			return redirect('admin/foundation')->with('status', $output);
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
		DB::rollBack();
		//echo $e;
		return redirect('admin/foundation')->with('status', $output);
        }

        

    }

    public function edit($id)
    {
        $foundation = Foundation::find($id);
        $contact = FoundationContact::where('foundation_id', $id)->first();
        $advertise = FoundationAdvertise::where('foundation_id', $id)->first();
        
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

        $foundation_purpose = FoundationPurpose::where('foundation_id', $id)->get();
        $selectedPurpose = array();
        foreach ($foundation_purpose as $key => $purpose_id) {
            $selectedPurpose[$key] = $purpose_id->param_id;
        }
        
       /*  $genders = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        } */

        $foundation_gender = FoundationGender::where('foundation_id', $id)->get();
        $selectedGender = array();
        foreach ($foundation_gender as $key => $gender_id) {
            $selectedGender[$key] = $gender_id->param_id;
        }

        /* $subjects = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
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
        } */

        $foundation_subject = FoundationSubject::where('foundation_id', $id)->get();
        $selectedSubject = array();
        foreach ($foundation_subject as $key => $subject_id) {
            $selectedSubject[$key] = $subject_id->param_id;
        }
	
        $age = FoundationAge::where('foundation_id', $id)->get();

        $months = array(
                    "1"  => "Jan",
                    "2"  => "Fab",
                    "3"  => "Mar",
                    "4"  => "Apr",
                    "5"  => "May",
                    "6"  => "Jun",
                    "7"  => "Jul",
                    "8"  => "Aug",
                    "9"  => "Sep",
                    "10" => "Oct",
                    "11" => "Nov",
                    "12" => "Dec"
            );

        //foundation locations
        $location = FoundationLocation::where('foundation_id', $id)->get();
        $dates    = FoundationDates::where('foundation_id', $id)->first();

        //country block
        $blocks = CountryBlock::select('id', 'name')->get();
        $blocks_arr = array();
        foreach ($blocks as $block) {
            $blocks_arr[$block->id] = $block->name;
        }

        //countries
        $countries = Country::select('id', 'country_name')->get();
        $country_arr = array();
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }

        //region
        $regions = Region::select('id', 'region_name')->get();
        $region_arr = array();
        foreach ($regions as $region) {
            $region_arr[$region->id] = $region->region_name;
        }

        //city 
        $cities = City::select('id', 'city_name')->get();
		/* $userparam = FoundationPurpose::select('param_id')->where('foundation_id', $id)->get();
		$i=0;
		foreach ($userparam as $userparamid) {
            $purposeId[$i] = $userparamid->param_id;
			$i++;
        } */
        $city_arr = array();
        foreach ($cities as $city) {
            $city_arr[$city->id] = $city->city_name;
        }
        $purpose = Purpose::pluck('purpose', 'id')->all();	
		$gender = gender::pluck('name', 'id')->all();	
		$subject = Subject::pluck('name', 'id')->all();	
        return view('admin.foundation.edit')->with(compact('foundation', 'contact', 'advertise', 'purpose', 'selectedPurpose', 'gender', 'selectedGender', 'subject', 'selectedSubject', 'age', 'location', 'dates', 'months', 'blocks_arr', 'country_arr', 'region_arr', 'city_arr','purposeId'));
    }

    public function update(Request $request, $id) 
    {	DB::beginTransaction();
        try {
			
                $result = $request->all();

                $foundation = array(
                        "user_id" => 1,
                        "sort"  => $result['sort_name'],
                        "name"  => $result['name'],
                        "administrator"  => $result['admin'],
                        "status"  => $result['status'],
                        "asset"  => $result['asset'],
                        "source"  => $result['source'],
                        "language"  => $result['language_id'],
                        "type"  => $result['type'],
                        "org_no"  => $result['org_no'],
                        "remarks"  => $result['remarks']
                );
                DB::table('gg_foundation')->where('id', $id)->update($foundation);
                /*$update_foundation = Foundation::where('id', $id)
                                            ->update($foundation);*/

                $contact = array(
                        "foundation_id" => $id,
                        "phone_no" => $result['phone'],
                        "mobile_no"  => $result['mobile'],
                        "email"  => $result['email'],
                        "website"  => $result['website'],
                        "address1"  => $result['address_1'],
                        "address2"  => $result['address_2'],
                        "address3"  => $result['address_3'],
                        "zip"  => $result['zipcode'],
                        "c_name"  => $result['c_name'],
                        "c_phone_no"  => $result['c_phone'],
                        "c_mobile_no"  => $result['c_mobile'],
                        "c_address"  => $result['c_address'],
                        "c_email"  => $result['c_email']
                );
                DB::table('gg_foundation_contact')->where('foundation_id', $id)->update($contact);

                $f_advertise = array(
                        "foundation_id" => $id,
                        "who_can_apply"  => $result['who_can_apply'],
                        "purpose"  => $result['purpose_detail'],
                        "details"  => $result['application_details'],
                        "misc"  => $result['misc']
                );
                DB::table('gg_foundation_advertise')->where('foundation_id', $id)->update($f_advertise);
				
                if(!empty($result['age_from'])){
				$i =0;
				FoundationAge::where('foundation_id', $id)->delete();
				foreach($result['age_from'] as $agef){
					$aget = $result['age_to'];
					
					$age = array(
							"foundation_id" => $id,
							"from"  => $agef,
							"to"  => $aget[$i]
					);
				//	echo $age[$i];exit;
					FoundationAge::insert($age);
					$i++;
					}
				}                   
               
            
				if(!empty($result['country_block'])){
				$i =0;
				FoundationLocation::where('foundation_id', $id)->delete();
				foreach($result['country_block'] as $countryblock){
					 $country = $result['country_block'];
					 $region = $result['region'];
					 $city = $result['city'];
					 $parish = $result['parish'];
					 
					$location = array(
							"foundation_id" => $id,
							"nation_id"  => $countryblock[$i],
							"country_id"  =>  $country[$i],
							"region_id"  => $region[$i],
							"city_id"  => $city[$i],
							"parish"  => $parish[$i]
					);
					FoundationLocation::insert($location);
				} 
				$i++;
			}
			
                $dates = array(
                        "foundation_id" => $id,
                        "start_month"  => $result['apply_start_month'],
                        "start_day"  => $result['apply_start_day'],
                        "end_month"  => $result['apply_end_month'],
                        "end_day"  => $result['apply_end_day']
                );
                DB::table('gg_foundation_dates')->where('foundation_id', $id)->update($dates);

                FoundationPurpose::where('foundation_id', $id)->delete();
				
				if(!empty($result['purpose_ids'])){
				foreach ($result['purpose_ids'] as $purpose_id) {
					$purpose = array(
							"foundation_id" => $id,
							"param_id" => $purpose_id
					);
					FoundationPurpose::insert($purpose);
				}
			}
                
                //Foundation Gender
                FoundationGender::where('foundation_id', $id)->delete();
				if(!empty($result['gender_ids'])){
					foreach ($result['gender_ids'] as $gender_id) {
						$gender = array(
								"foundation_id" => $id,
								"param_id" => $gender_id
						);
						FoundationGender::insert($gender);
					}
				}

                //Foundation Subject
                FoundationSubject::where('foundation_id', $id)->delete();
				if(!empty($result['gender_ids'])){
					foreach ($result['subject_ids'] as $subject_id) {
						$subject = array(
								"foundation_id" => $id,
								"param_id" => $subject_id
						);
						FoundationSubject::insert($subject);
					}
				}

                $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
				DB::commit();
				return redirect('admin/foundation')->with('status', $output);
            } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
				DB::rollBack();
				echo $e;
				//return redirect('admin/foundation')->with('status', $output);
            }

           
    }

    public function delete($id)
    {
        try {
            Foundation::where('id', $id)->delete();
            FoundationContact::where('foundation_id', $id)->delete();
            FoundationAdvertise::where('foundation_id', $id)->delete();
            FoundationLocation::where('foundation_id', $id)->delete();
            FoundationAge::where('foundation_id', $id)->delete();
            FoundationDates::where('foundation_id', $id)->delete();
            FoundationPurpose::where('foundation_id', $id)->delete();
            FoundationGender::where('foundation_id', $id)->delete();
            FoundationSubject::where('foundation_id', $id)->delete();

            $output = ['success' => true,
                        'msg' => __("Module Field Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/foundation')->with('status', $output);
    }
}