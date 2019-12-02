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

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;

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
            //$country_arr[$country->id] = $country->country_name;
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


        return view('admin.foundation.create')->with(compact('purpose', 'gender', 'subject', 'months', 'blocks_arr', 'country_arr', 'region_arr', 'city_arr'));
    }

    public function store(Request $request)
    {
        try {
            $result = $request->all();
            
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
            $location = array(
                    "foundation_id" => $foundation_id,
                    "nation_id"  => $result['country_block'],
                    "country_id"  => $result['country'],
                    "region_id"  => $result['region'],
                    "city_id"  => $result['city'],
                    "parish"  => $result['parish']
            );
            FoundationLocation::insert($location);
            
            //Foundation Purpose
            foreach ($result['purpose_ids'] as $purpose_id) {
                $purpose = array(
                        "foundation_id" => $foundation_id,
                        "param_id" => $purpose_id
                );
                FoundationPurpose::insert($purpose);
            }

            //Foundation Gender
            foreach ($result['gender_ids'] as $gender_id) {
                $gender = array(
                        "foundation_id" => $foundation_id,
                        "param_id" => $gender_id
                );
                FoundationGender::insert($gender);
            }

            //Foundation Subject
            foreach ($result['subject_ids'] as $subject_id) {
                $subject = array(
                        "foundation_id" => $foundation_id,
                        "param_id" => $subject_id
                );
                FoundationSubject::insert($subject);
            }

            //Foundation AGE
            $age = array(
                    "foundation_id" => $foundation_id,
                    "from"  => $result['age_from'],
                    "to"  => $result['age_to']
            );
            FoundationAge::insert($age);

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

            $output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/foundation')->with('status', $output);

    }

    public function edit($id)
    {
        $foundation = Foundation::find($id);
        $contact = FoundationContact::where('foundation_id', $id)->first();
        $advertise = FoundationAdvertise::where('foundation_id', $id)->first();
        
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

        $foundation_purpose = FoundationPurpose::where('foundation_id', $id)->get();
        $selectedPurpose = array();
        foreach ($foundation_purpose as $key => $purpose_id) {
            $selectedPurpose[$key] = $purpose_id->param_id;
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

        $foundation_gender = FoundationGender::where('foundation_id', $id)->get();
        $selectedGender = array();
        foreach ($foundation_gender as $key => $gender_id) {
            $selectedGender[$key] = $gender_id->param_id;
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

        $foundation_subject = FoundationSubject::where('foundation_id', $id)->get();
        $selectedSubject = array();
        foreach ($foundation_subject as $key => $subject_id) {
            $selectedSubject[$key] = $subject_id->param_id;
        }

        $age = FoundationAge::where('foundation_id', $id)->first();

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
        $location = FoundationLocation::where('foundation_id', $id)->first();
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

        $city_arr = array();
        foreach ($cities as $city) {
            $city_arr[$city->id] = $city->city_name;
        }
        
        return view('admin.foundation.edit')->with(compact('foundation', 'contact', 'advertise', 'purpose', 'selectedPurpose', 'gender', 'selectedGender', 'subject', 'selectedSubject', 'age', 'location', 'dates', 'months', 'blocks_arr', 'country_arr', 'region_arr', 'city_arr'));
    }

    public function update(Request $request, $id) 
    {
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
                $age = array(
                        "foundation_id" => $id,
                        "from"  => $result['age_from'],
                        "to"  => $result['age_to']
                );                   
                DB::table('gg_foundation_age')->where('foundation_id', $id)->update($age);

                $location = array(
                        "foundation_id" => $id,
                        "nation_id"  => $result['country_block'],
                        "country_id"  => $result['country'],
                        "region_id"  => $result['region'],
                        "city_id"  => $result['city'],
                        "parish"  => $result['parish']
                );
                DB::table('gg_foundation_location')->where('foundation_id', $id)->update($location);


                $dates = array(
                        "foundation_id" => $id,
                        "start_month"  => $result['apply_start_month'],
                        "start_day"  => $result['apply_start_day'],
                        "end_month"  => $result['apply_end_month'],
                        "end_day"  => $result['apply_end_day']
                );
                DB::table('gg_foundation_dates')->where('foundation_id', $id)->update($dates);

                FoundationPurpose::where('foundation_id', $id)->delete();

                foreach ($result['purpose_ids'] as $purpose_id) {
                    $purpose = array(
                            "foundation_id" => $id,
                            "param_id" => $purpose_id
                    );
                    FoundationPurpose::insert($purpose);
                }
                
                //Foundation Gender
                FoundationGender::where('foundation_id', $id)->delete();
                foreach ($result['gender_ids'] as $gender_id) {
                    $gender = array(
                            "foundation_id" => $id,
                            "param_id" => $gender_id
                    );
                    FoundationGender::insert($gender);
                }

                //Foundation Subject
                FoundationSubject::where('foundation_id', $id)->delete();
                foreach ($result['subject_ids'] as $subject_id) {
                    $subject = array(
                            "foundation_id" => $id,
                            "param_id" => $subject_id
                    );
                    FoundationSubject::insert($subject);
                }

                $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return redirect('admin/foundation')->with('status', $output);
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