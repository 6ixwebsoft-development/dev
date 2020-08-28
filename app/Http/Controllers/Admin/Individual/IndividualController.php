<?php

namespace App\Http\Controllers\Admin\Individual;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Documents;
use App\Models\Foundation;
//Individual models

use App\Models\Individual;
use App\Models\IndividualCare;
use App\Models\IndividualChildern;
use App\Models\IndividualContact;
use App\Models\IndividualLibrary;
use App\Models\IndividualPerpose;
use App\Models\IndividualPersonal;
use App\Models\IndividualProject;
use App\Models\IndividualResearch;
use App\Models\IndividualStudy;
use App\Models\IndividualVideo;
use App\Models\IndividualWalfare;
use App\Models\Language;
use App\Models\Library;
use App\Models\ModuleField;
use App\Models\Order;
use App\Models\Purpose;
use App\Models\Region;
use App\Models\Subscription;
use App\Models\UserSearchSave;
use App\Models\Usertyperole;
use App\User;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class IndividualController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = User::where('user_type', 'IND')->where('status', '!=', '3')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('roles', function ($row) {
                    $s_btn = '';
                    if (!empty($row->getRoleNames())) {
                        foreach ($row->getRoleNames() as $v) {
                            $s_btn = '<label class="badge badge-success">' . $v . '</label>';
                        }
                    }

                    return $s_btn;
                })
                ->escapeColumns([])
                ->addColumn('action', function ($row) {
                    $txt = "'Are you sure to delete this?'";
                    $btn = '<a href="' . url('admin') . '/individual/' . $row->id . '/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm(' . $txt . ')" href="' . url('admin') . '/individual/delete/' . $row->id . '" class="delete btn btn-primary btn-sm">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->addColumn('checkbox', function ($row) {

                    $btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="' . $row->id . '">';

                    return $btn;
                })
                ->rawColumns(['checkbox'])
                ->escapeColumns([])
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $btn = '<label class="badge badge-success">Active</label>';
                    } else {
                        $btn = '<label class="badge badge-danger">Inactive</label>';
                    }

                    return $btn;
                })
                ->rawColumns(['status'])->escapeColumns([])->addColumn('name', function ($row) {$btn = ''; $controller = 'individual'; $btn = '<a href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->name . '</a>';return $btn;})->rawColumns(['name'])->addColumn('email', function ($row) {$btn = ''; $controller = 'individual'; $btn = '<a href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->email . '</a>';return $btn;})->rawColumns(['email'])
                ->make(true);
        }

        return view('admin.individual.index');
    }

    public function create()
    {
        $civilstatuss = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
        //->where('gg_module_fields.module_id', $id)
            ->where('gg_module_fields.field_name', 'Civil Status')
            ->select(
                'mfv.id',
                'gg_module_fields.field_name',
                'gg_module_fields.field_type',
                'mfv.value'
            )
            ->get();
        $civilstatus = array();
        foreach ($civilstatuss as $civilstatusval) {
            $civilstatus[$civilstatusval->id] = $civilstatusval->value;
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
        }  */

        //$roles = Role::pluck('name','id')->all();
        $country   = Country::pluck('country_name', 'id')->all();
        $purpose   = Purpose::pluck('purpose', 'id')->all();
        $userroles = Role::all();
        $language  = Language::where('status', '1')->pluck('language', 'id')->all();
        /* print_r($) */

        $rolesIds = Usertyperole::where('type', 'TESt')->first();
        $roleid   = json_decode($rolesIds, true);
        $dataids  = $roleid['role_ids'];

        //DB::enableQueryLog();
        $roles   = Role::select('name', 'id')->whereIn('id', ["5", "6", "7"])->get();
        $library = Library::select('name', 'id')->where('type', '1')->get();
        //dd(DB::getQueryLog());
        //echo "<pre>";
        //print_r($roles);exit;

        return view('admin.individual.create', compact('roles', 'userroles', 'language', 'country', 'purpose', 'civilstatus', 'gender', 'library'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'    => 'required',
            'lastname'     => 'required',
            'availability' => 'required',
            'email'        => 'required|email|unique:users,email',
            'region'       => 'required',
            'rregion'      => 'residenceregion|required',
            'bregion'      => 'birthregion|required',
            'city'         => 'required'
        ]);

        DB::beginTransaction();
        try
        {
            $result = $request->all();

            //userLogin
            $userLog = array(
                "email"      => $result['email'],
                "name"       => $result['firstname'] . ' ' . $result['lastname'],
                "password"   => $result['email'],
                "user_type"  => "IND",
                "status"     => 1,
                "created_at" => Now(),
            );

            $user_id = User::insertGetId($userLog);

            DB::table('model_has_roles')->insert(
                ['role_id' => $result['userrole'], 'model_type' => 'App\User', 'model_id' => $user_id]
            );

            $dob = date("Y-m-d", strtotime($result['dob']));
            //Individual Basic info
            $basicinfo = array(
                "userid"       => $user_id,
                "firstname"    => $result['firstname'],
                "lastname"     => $result['lastname'],
                "middlename"   => $result['middlename'],
                "age"          => $result['age'],
                "dob"          => $dob,
                "language"     => $result['language'],
                "availability" => $result['availability'],
                "created_at"   => Now(),
            );

            $indId = Individual::insertGetId($basicinfo);

            $contactinfo = array(
                "userid"       => $user_id,
                "streetadress" => $result['streetaddress'],
                "individualid" => $indId,
                "zipcode"      => $result['zipcode'],
                "country"      => $result['country'],
                "region"       => $result['region'],
                "city"         => $result['city'],
                "personal"     => $result['personal'],
                "mobile"       => $result['mobile'],
                "phone"        => $result['phone'],
                "created_at"   => Now(),
            );

            IndividualContact::insert($contactinfo);

            $personalinfo = array(
                "userid"            => $user_id,
                "individualid"      => $indId,
                "gender"            => $result['gender'],
                "civilstatus"       => $result['civilstatus'],
                "occupation"        => $result['occupation'],
                "nationality"       => $result['nationality'],
                "residenceregion"   => $result['rregion'],
                "residencecity"     => $result['rcity'],
                "residenceparish"   => $result['rparish'],
                "birthregion"       => $result['bregion'],
                "birthcity"         => $result['bcity'],
                "birthparish"       => $result['bparish'],
                "applicationletter" => $result['appletter'],
                "created_at"        => Now(),
            );

            IndividualPersonal::insert($personalinfo);
            $purpose = '';
            if (!empty($result['purposelist'])) {
                $purpose = json_encode($result['purposelist']);
            }
            $purposelist = array(
                "userid"       => $user_id,
                "individualid" => $indId,
                "purposeid"    => $purpose,
                "created_at"   => Now(),
            );
            //print_r($result);exit;
            //print_r($result);exit;
            //DB::enableQueryLog();
            IndividualPerpose::insert($purposelist);
            //dd(DB::getQueryLog());

            if (!empty($result['sgovtsupport'])) {$sgovt = $result['sgovtsupport'];} else { $sgovt = 3;}
            $sdate = date("Y-m-d", strtotime($result['sdate']));
            $edate = date("Y-m-d", strtotime($result['enddate']));
            $study = array(
                "userid"                 => $user_id,
                "individualid"           => $indId,
                "studyfield"             => $result['studyfield'],
                "studydegree"            => $result['degree'],
                "studyschool"            => $result['school'],
                "studylocation"          => $result['location'],
                "studystart"             => $sdate,
                "studyend"               => $edate,
                "studygovtsupport"       => $sgovt,
                "studypreviousdegree"    => $result['pdegree'],
                "studyprevioulength"     => $result['plength'],
                "studypreviousschool"    => $result['pschool'],
                "studyprevioulocation"   => $result['plocation'],
                "studyhighschool"        => $result['hschool'],
                "studyhighlocation"      => $result['hlocation'],
                "studyhighotherlocation" => $result['hotherlocation'],
                "studyhighotherinfo"     => $result['sadditionalinfo'],
                "studyadditionalinfo"    => $result['sadditionalinfo'],
                "created_at"             => Now(),
            );
            //print_r($study);exit;
            //print_r($study);exit;
            IndividualStudy::insert($study);

            $care = array(
                "userid"            => $user_id,
                "individualid"      => $indId,
                "careillness"       => $result['careillness'],
                "caresymptoms"      => $result['caresymptoms'],
                "carehospital"      => $result['carehospital'],
                "carehealthregion"  => $result['carehealthregion'],
                "careaddtionalinfo" => $result['careaddtionalinfo'],
                "created_at"        => Now(),
            );

            IndividualCare::insert($care);

            $walfare = array(
                "userid"                => $user_id,
                "individualid"          => $indId,
                "welfareneeds"          => $result['welfareneeds'],
                "welfareadditionalinfo" => $result['welfareadditionalinfo'],
                "created_at"            => Now(),
            );

            IndividualWalfare::insert($walfare);
            if (!empty($result['researchsubject'])) {$subjects = $result['researchsubject'];} else { $subjects = null;}
            if (!empty($result['researchgovtsupport'])) {$rgovt = $result['researchgovtsupport'];} else { $rgovt = 3;}
            $rdate    = date("Y-m-d", strtotime($result['researchstartdate']));
            $redate   = date("Y-m-d", strtotime($result['researchenddate']));
            $research = array(
                "userid"                 => $user_id,
                "individualid"           => $indId,
                "researchsubject"        => $subjects,
                "researchobjective"      => $result['researchobjective'],
                "researchlimitation"     => $result['researchlimitation'],
                "researchadditionalinfo" => $result['researchadditionalinfo'],
                "researchstartdate"      => $rdate,
                "researchenddate"        => $redate,
                "researchgovtsupport"    => $rgovt,
                "researchprevstudy"      => $result['researchprevstudy'],
                "researchprevschool"     => $result['researchprevschool'],
                "researchhighschool"     => $result['researchhighschool'],
                "created_at"             => Now(),
            );

            IndividualResearch::insert($research);

            $project = array(
                "userid"              => $user_id,
                "individualid"        => $indId,
                "projectobject"       => $result['projectobject'],
                "projectpurpose"      => $result['projectpurpose'],
                "projectgeoarea"      => $result['projectgeoarea'],
                "projectbeneficiries" => $result['projectbeneficiries'],
                "projectotherinfo"    => $result['projectotherinfo'],
                "created_at"          => Now(),
            );

            IndividualProject::insert($project);
            if (!empty($result['videotype'])) {
                $i = 0;
                foreach ($result['videotype'] as $type) {
                    $url   = $result['video_url'];
                    $video = array(
                        "userid"       => $user_id,
                        "individualid" => $indId,
                        "type"         => $type,
                        "url"          => $url[$i],
                        "created_at"   => Now(),
                    );
                    IndividualVideo::insert($video);
                    $i++;}
            }

            if (!empty($result['videotype'])) {
                $j        = 0;
                $gender   = $result['cgender'];
                $school   = $result['cschool'];
                $location = $result['clocation'];
                foreach ($result['cdob'] as $Cdob) {
                    $childern = array(
                        "userid"           => $user_id,
                        "individualid"     => $indId,
                        "childerndob"      => $Cdob,
                        "childerngender"   => $gender[$j],
                        "childernschool"   => $school[$j],
                        "childernlocation" => $location[$j],
                        "created_at"       => Now(),
                    );
                    IndividualChildern::insert($childern);
                    $j++;}
            }

            if (!empty($result['librarycard'])) {
                $libraryinfo = array(
                    "userid"            => $id,
                    "librarycity"       => $result['librarycity'],
                    "librarycardnumber" => $result['librarycard'],
                    "librarycomment"    => $result['library_comment'],
                    "updated_at"        => Now(),
                );
                IndividualLibrary::insertGetId($libraryinfo);
            }

            $output = ['class' => 'alert-position-success',
                'msg'              => __("Individual created"),
            ];
            DB::commit();
            //return redirect('admin/individual')->with('message', $output);
            return redirect('admin/individual/' . $user_id . '/edit')->with('message', $output);
        } catch (\Exception $e) {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("Individual Not create" . $e),
            ];
            DB::rollBack();
            //echo $e;
            return redirect('admin/individual/create')->with('message', $output);
        }

    }

    public function edit($id)
    {    	
    	//die();
        $civilstatuss = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
        //->where('gg_module_fields.module_id', $id)
            ->where('gg_module_fields.field_name', 'Civil Status')
            ->select(
                'mfv.id',
                'gg_module_fields.field_name',
                'gg_module_fields.field_type',
                'mfv.value'
            )
            ->get();
        $civilstatus = array();
        foreach ($civilstatuss as $civilstatusval) {
            $civilstatus[$civilstatusval->id] = $civilstatusval->value;
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
            // $purpose[$purposeVal->id] = $purposeVal->value;
        }

        /* $data = Individual::get();
        $data = Individual::alldata(3);
        echo "<pre>"; print_r($data);exit; */
        //$roles = Role::pluck('name','id')->all();

        /* $formids = ["1","2"];
        ->whereIn('formid',1) */

        $purpose = Purpose::pluck('purpose', 'id')->all();
        //$s = Role::all();
        $language   = Language::where('status', '1')->pluck('language', 'id')->all();
        $individual = Individual::where('userid', $id)->first();
        $user       = User::where('id', $id)->first();
        $userroles  = $user->roles->pluck('id', 'name')->first();

        $roles    = Role::pluck('name', 'name')->all();
        $contact  = IndividualContact::where('userid', $id)->first();
        $personal = IndividualPersonal::where('userid', $id)->first();
        $purposes = IndividualPerpose::where('userid', $id)->first();

        $country = Country::pluck('country_name', 'id')->all();
        $region  = Region::where('country_id', $contact->country)->pluck('region_name', 'id');
        $city    = City::where('region_id', $contact->region)->pluck('city_name', 'id');

        $birthcity     = City::where('region_id', $personal->birthregion)->pluck('city_name', 'id');
        $residencecity = City::where('region_id', $personal->residenceregion)->pluck('city_name', 'id');

        //print_r($region);
        //$city = City::pluck('city_name','id')->where(['id' => $contact->region_id])->get();

        if (!empty($purposes->purposeid)) {$purposeId = json_decode($purposes->purposeid);} else { $purposeId = '';}
        //print_r($purposeId);exit;
        /* $purposeId = json_decode($purposes->purposeid); */
        $study    = IndividualStudy::where('userid', $id)->first();
        $care     = IndividualCare::where('userid', $id)->first();
        $walfare  = IndividualWalfare::where('userid', $id)->first();
        $research = IndividualResearch::where('userid', $id)->first();
        $project  = IndividualProject::where('userid', $id)->first();
        $video    = IndividualVideo::where('userid', $id)->get();
        $childern = IndividualChildern::where('userid', $id)->get();
        /*  echo "<pre>";
        print_r($user);exit; */
        $rolesIds = Usertyperole::where('type', 'TESt')->first();
        $roleid   = json_decode($rolesIds, true);

        $dataids = $roleid['role_ids'];

        $roles = Role::select('name', 'id')->whereIn('id', ["5", "6", "7"])->get();

        $orderList      = Order::where('userid', $id)->get();
        $subsList       = Subscription::where('userid', $id)->where('user_type', 'IND')->get();
        $foundationList = UserSearchSave::where('user_id', $id)->get();

        $library = Library::where(['type' => '1'])->get()->where('roles', 9);
        // foreach ($library as $row) {
        //     dd($row);
        // }
        //dd($library);
        //die();

        $IndividualLibrary = IndividualLibrary::where('userid', $user->id)->first();
        $foundsids         = array();
        foreach ($foundationList as $foundids) {
            $foundsids[] = $foundids['foundation_id'];
        }

        $myfoundList = Foundation::whereIn('id', $foundsids)->get();

        $logo  = Documents::where('userid', $id)->where('filetype', 1)->where('type', 'IND')->first();
        $doc   = Documents::where('userid', $id)->where('filetype', 2)->where('type', 'IND')->get();
        $photo = Documents::where('userid', $id)->where('filetype', 3)->where('type', 'IND')->get();

        //dd($user);
        /* echo"<pre>";
        print_r($subsList);exit; */
        return view('admin.individual.edit', compact('roles', 'language', 'country', 'purpose', 'individual', 'user', 'contact', 'personal', 'purpose', 'purposeId', 'study', 'care', 'walfare', 'research', 'project', 'video', 'childern', 'civilstatus', 'gender', 'userroles', 'orderList', 'subsList', 'myfoundList', 'library', 'IndividualLibrary', 'logo', 'doc', 'photo', 'region', 'city', 'birthcity', 'residencecity'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, 
        	[
	            'firstname'    => 'required',
	            'lastname'     => 'required',
	            'availability' => 'required',
	            'email'        => 'required|email|unique:users,email,' . $id,
	            'region'       => 'required',
	            'rregion'      => 'required',
	            'bregion'      => 'required',
	            'city'         => 'required'
	        ],
	        [
		    	'rregion.required'=> 'Residence Region is Required', // custom message		    
		    	'bregion.required'=> 'Birth Region is Required' // custom message
		   ]
		);

        DB::beginTransaction();
        try {

            $result = $request->all();
            //print_r($_FILES);
            //echo $request->file('logoImg');
            //echo $result['logoImg'];
            //exit;
            $userLog = array(
                "email"      => $result['email'],
                "name"       => $result['firstname'] . ' ' . $result['lastname'],
                "updated_at" => Now(),
            );
            DB::table('users')->where('id', $id)->update($userLog);
            DB::table('model_has_roles')->where('model_id', $id)->update(
                ['role_id' => $result['userrole']]
            );

            $dob       = date("Y-m-d", strtotime($result['dob']));
            $basicinfo = array(
                "firstname"    => $result['firstname'],
                "lastname"     => $result['lastname'],
                "middlename"   => $result['middlename'],
                "age"          => $result['age'],
                "dob"          => $dob,
                "language"     => $result['language'],
                "availability" => $result['availability'],
                "updated_at"   => Now(),
            );
            DB::table('individual')->where('userid', $id)->update($basicinfo);

            $contactinfo = array(

                "streetadress" => $result['streetaddress'],
                "zipcode"      => $result['zipcode'],
                "country"      => $result['country'],
                "region"  =>  $result['region'],
                "city"         => $result['city'],
                "personal"     => $result['personal'],
                "mobile"       => $result['mobile'],
                "phone"        => $result['phone'],
                "updated_at"   => Now(),
            );          



            if (!empty($result['region'])) {
                $contactinfo["region"] = $result['region'];
            }

            DB::table('individual_contact')->where('userid', $id)->update($contactinfo);

            $personalinfo = array(

                "gender"            => $result['gender'],
                "civilstatus"       => $result['civilstatus'],
                "occupation"        => $result['occupation'],
                "nationality"       => $result['nationality'],
                "residenceregion"   => $result['rregion'],
                "residencecity"     => $result['rcity'],
                "residenceparish"   => $result['rparish'],
                "birthregion"       => $result['bregion'],
                "birthcity"         => $result['bcity'],
                "birthparish"       => $result['bparish'],
                "applicationletter" => $result['appletter'],
                "updated_at"        => Now(),
            );
            // if (!empty($result['rregion'])) {
            //     $contactinfo["residenceregion"] = $result['rregion'];
            // }
            // if (!empty($result['bregion'])) {
            //     $contactinfo["birthregion"] = $result['bregion'];
            // }
            DB::table('individual_personal')->where('userid', $id)->update($personalinfo);

            $purpose = '';
            if (!empty($result['purposelist'])) {
                $purpose = json_encode($result['purposelist']);
            }
            $purposelist = array(
                "purposeid"  => $purpose,
                "updated_at" => Now(),
            );
            DB::table('individual_purposelist')->where('userid', $id)->update($purposelist);

            if (!empty($result['sgovtsupport'])) {$sgovt = $result['sgovtsupport'];} else { $sgovt = 3;}
            $sdate = date("Y-m-d", strtotime($result['sdate']));
            $edate = date("Y-m-d", strtotime($result['enddate']));
            $study = array(
                "studyfield"             => $result['studyfield'],
                "studydegree"            => $result['degree'],
                "studyschool"            => $result['school'],
                "studylocation"          => $result['location'],
                "studystart"             => $sdate,
                "studyend"               => $edate,
                "studygovtsupport"       => $sgovt,
                "studypreviousdegree"    => $result['pdegree'],
                "studyprevioulength"     => $result['plength'],
                "studypreviousschool"    => $result['pschool'],
                "studyprevioulocation"   => $result['plocation'],
                "studyhighschool"        => $result['hschool'],
                "studyhighlocation"      => $result['hlocation'],
                "studyhighotherlocation" => $result['hotherlocation'],
                "studyhighotherinfo"     => $result['sadditionalinfo'],
                "studyadditionalinfo"    => $result['sadditionalinfo'],
                "updated_at"             => Now(),
            );

            DB::table('individual_study')->where('userid', $id)->update($study);

            $care = array(

                "careillness"       => $result['careillness'],
                "caresymptoms"      => $result['caresymptoms'],
                "carehospital"      => $result['carehospital'],
                "carehealthregion"  => $result['carehealthregion'],
                "careaddtionalinfo" => $result['careaddtionalinfo'],
                "updated_at"        => Now(),
            );

            DB::table('individual_care')->where('userid', $id)->update($care);

            $walfare = array(

                "welfareneeds"          => $result['welfareneeds'],
                "welfareadditionalinfo" => $result['welfareadditionalinfo'],
                "updated_at"            => Now(),
            );

            DB::table('individual_welfare')->where('userid', $id)->update($walfare);

            if (!empty($result['researchsubject'])) {$subjects = $result['researchsubject'];} else { $subjects = null;}
            if (!empty($result['researchgovtsupport'])) {$rgovt = $result['researchgovtsupport'];} else { $rgovt = 3;}
            $rdate    = date("Y-m-d", strtotime($result['researchstartdate']));
            $redate   = date("Y-m-d", strtotime($result['researchenddate']));
            $research = array(

                "researchsubject"        => $subjects,
                "researchobjective"      => $result['researchobjective'],
                "researchlimitation"     => $result['researchlimitation'],
                "researchadditionalinfo" => $result['researchadditionalinfo'],
                "researchstartdate"      => $rdate,
                "researchenddate"        => $redate,
                "researchgovtsupport"    => $rgovt,
                "researchprevstudy"      => $result['researchprevstudy'],
                "researchprevschool"     => $result['researchprevschool'],
                "researchhighschool"     => $result['researchhighschool'],
                "updated_at"             => Now(),
            );

            DB::table('individual_research')->where('userid', $id)->update($research);

            $project = array(

                "projectobject"       => $result['projectobject'],
                "projectpurpose"      => $result['projectpurpose'],
                "projectgeoarea"      => $result['projectgeoarea'],
                "projectbeneficiries" => $result['projectbeneficiries'],
                "projectotherinfo"    => $result['projectotherinfo'],
                "updated_at"          => Now(),
            );
            DB::table('individual_project')->where('userid', $id)->update($project);

            if (!empty($result['videotype'])) {
                IndividualVideo::where('userid', $id)->delete();
                $i = 0;
                foreach ($result['videotype'] as $type) {
                    $url = $result['video_url'];

                    $video = array(
                        "userid"     => $id,
                        "type"       => $type,
                        "url"        => $url[$i],
                        "updated_at" => Now(),
                    );
                    IndividualVideo::insert($video);
                    $i++;}
            }

            if (!empty($result['videotype'])) {
                IndividualChildern::where('userid', $id)->delete();
                $j        = 0;
                $gender   = $result['cgender'];
                $school   = $result['cschool'];
                $location = $result['clocation'];
                foreach ($result['cdob'] as $Cdob) {
                    $childern = array(
                        "userid"           => $id,
                        "childerndob"      => $Cdob,
                        "childerngender"   => $gender[$j],
                        "childernschool"   => $school[$j],
                        "childernlocation" => $location[$j],
                        "updated_at"       => Now(),
                    );
                    IndividualChildern::insert($childern);
                    $j++;}
            }

            if (!empty($result['librarycard'])) {
                IndividualLibrary::where('userid', $id)->delete();
                $libraryinfo = array(
                    "userid"            => $id,
                    "librarycity"       => $result['librarycity'],
                    "librarycardnumber" => $result['librarycard'],
                    "librarycomment"    => $result['library_comment'],
                    "updated_at"        => Now(),
                );
                IndividualLibrary::insertGetId($libraryinfo);

            }

            if (!empty($request->file('logoImg'))) {
                $imageName = time() . '.' . request()->logoImg->getClientOriginalExtension();
                request()->logoImg->move(public_path('uploads/images'), $imageName);
                $datalogo = array(
                    'userid'     => $id,
                    'name'       => $imageName,
                    'type'       => 'IND',
                    'filetype'   => 1,
                    'created_at' => now(),
                );
                Documents::insert($datalogo);
            }

            if ($documents = $request->file('documents')) {
                $i = 0;
                foreach ($documents as $files) {
                    $destinationPath = 'uploads/images'; // upload path

                    $profileImage = md5(microtime() . $i) . "Photo." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $datadoc = array(
                        'userid'     => $id,
                        'name'       => $profileImage,
                        'type'       => 'IND',
                        'filetype'   => 2,
                        'created_at' => now(),
                    );
                    Documents::insert($datadoc);
                }
            }

            if ($photos = $request->file('photos')) {
                $i = 0;
                foreach ($photos as $files) {
                    $destinationPath = 'uploads/images'; // upload path

                    $profileImage = md5(microtime() . $i) . "Photo." . $files->getClientOriginalExtension();
                    $files->move($destinationPath, $profileImage);
                    $dataphoto = array(
                        'userid'     => $id,
                        'name'       => $profileImage,
                        'type'       => 'IND',
                        'filetype'   => 3,
                        'created_at' => now(),
                    );
                    Documents::insert($dataphoto);
                }
            }

            $output = [
            	       'class' => 'alert-position-success',
                       'msg'   => __("Individual updated"),
            		];
            DB::commit();
            return redirect(URL::privious())->with('message', $output);

        }catch (\Exception $e) {

            $output  =  [
            				'class' => 'alert-position-danger',
                			'msg'   => __("Individual Not updated"),
            			];
            DB::rollBack();            
            return redirect('admin/individual')->with('message', $output);

        }
    }

    public function delete($uid)
    {
        try {
            /* Individual::where('userid', $id)->delete();
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
            User::where('id', $id)->delete(); */
            $data = array(
                'name'   => 'DELETE_' . $uid . '@globalgarnt.com',
                'status' => 3,
                'email'  => 'DELETE_' . $uid . '@globalgarnt.com',
            );
            Documents::delete_data($uid);            
            DB::table('users')->where('id', $uid)->update($data);
            $queryRun = Individual::delete_data($uid);
            IndividualContact::delete_data($uid);
            IndividualPersonal::delete_data($uid);
            IndividualPerpose::delete_data($uid);
            IndividualStudy::delete_data($uid);
            IndividualCare::delete_data($uid);
            IndividualWalfare::delete_data($uid);
            IndividualResearch::delete_data($uid);
            IndividualProject::delete_data($uid);
            IndividualChildern::delete_data($uid);
            IndividualVideo::delete_data($uid);
            IndividualLibrary::delete_data($uid);
            Documents::delete_data($uid);
            

            $output = ['success' => true,
                'msg'                => __("Module Field Deleted"),
            ];
        } catch (\Exception $e) {

            $output = ['success' => false,
                'msg'                => __("messages.something_went_wrong"),
            ];
        }

        return redirect('admin/individual')->with('status', $output);
    }

    public function getregion(Request $request)
    {
        $region = Region::where('country_id', $request->cid)->get();
        $data   = '';
        $data .= '<option value="0">select region</option>';
        if ($region) {
            foreach ($region as $reg) {
                $data .= '<option value="' . $reg->id . '">' . $reg->region_name . '</option>';
            }
        }
        echo $data;
    }

    public function getcity(Request $request)
    {
        $city = City::where('region_id', $request->get('cid'))->get();
        $data = '';
        $data .= '<option value="0">select city</option>';
        if ($city) {
            foreach ($city as $reg) {
                $data .= '<option value="' . $reg->id . '">' . $reg->city_name . '</option>';
            }
        }
        echo $data;
    }

    public function updateaction(Request $request)
    {

        $foundation = array(
            'deleted' => $request->val,
        );

        $queryRun = UserSearchSave::whereIn('foundation_id', $request->favorite)->delete();

        if ($queryRun) {
            return 'yes';
        } else {
            return 'no';
        }
    }

}
