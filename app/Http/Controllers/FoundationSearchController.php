<?php

namespace App\Http\Controllers;

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

use App\Models\UserSearchSave;
use App\Models\SearchCount;

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\User;

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

        $cities = City::where('country_id', 1)->get();

        $city = array();
        foreach ($cities as $citi) {
            $city[$citi->id] = $citi->city_name;
        }
        
        return view('foundation-search')->with(compact('purpose', 'gender', 'subject', 'city'));
    }

    public function simpleSearchResult(Request $request)
    {
        $cityIds = $request->city_ids;

        $foundation_ids = $request->favourite_fund_ids;
        // echo "<pre>";
        // // print_r($cityIds);
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
                        ->orderBy('sc.count',  'desc')
                        ->whereIn('fp.param_id', array(2, 4))
                        ->where('cn.id', 1);

            /*if (!empty($purposeIds)) {
                $foundation->leftjoin('gg_foundation_purpose as fp', 'gg_foundation.id', 'fp.foundation_id');
                $foundation->whereIn('param_id', $purposeIds);
            }*/
            if (!empty($cityIds)) {
                $foundation->whereIn('fl.city_id', $cityIds);
            }

            if (!empty($foundation_ids)) {
                $foundation->whereIn('gg_foundation.id', $foundation_ids);
            }

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

        } else {

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
        //return response()->json(array("foundations" => $all_foundations, "foundations_contacts" => $foundation_contacts));
        return view('simple-search-result')->with(compact('all_foundations', 'fund_count', 'save_count'));
    }

    public function loadMore(Request $request) {
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
        }
        return response()->json($data);
    }

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
        return view('foundation-detail')->with(compact('foundation_details'));
    } 


    //advance search
    public function advanceSearch(Request $request) {
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

        return view('advance-search')->with(compact('purpose', 'gender', 'subject'));
    }

    public function getAdvanceFoundations(Request $request)
    {
        if ($request->ajax()) {

            $purposeIds = $request->get('purpose_ids');
            $genderIds  = $request->get('gender_ids');
            $subjectIds = $request->get('subject_ids');
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
                        );
                        //->where('cn.country_name', 'like', 'Sweden%');
            
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
                $foundation->where('ct.city_name', 'like', $cityName.'%');
            }

            //$data = $foundation->distinct()->get();
            $data = $foundation->limit(10)->get();
            //check user for contact show 
            $user = Auth::user();
            $foundation_contacts = array();

            if($user) {
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
            }

        }
        
        return response()->json(array("foundations" => $data, "foundations_contacts" => $foundation_contacts));
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

}