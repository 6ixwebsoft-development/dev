<?php

namespace App\Http\Controllers\Admin\Library;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Documents;
use App\Models\Language;
use App\Models\Library;
use App\Models\LibraryContact;
use App\Models\Libraryips;
use App\Models\Librarylogin;
use App\Models\Libraryremoteip;
use App\Models\Purpose;
use App\Models\Usertyperole;
use App\Models\Visit;
use App\User;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class LibraryController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = User::where('user_type', 'LIB')->where('status', '!=', '3')
                ->leftjoin('library_contact as lc', 'users.id', '=', 'lc.userid')
                ->leftjoin('librarylogin as llog', 'lc.id', '=', 'llog.libraryid')
                ->select(
                    'users.*',
                    'llog.remotename'
                )
                ->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $txt = "'Are you sure to delete this?'";
                    $btn = '<a href="' . url('admin') . '/library/' . $row->id . '/edit" class="edit btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm(' . $txt . ')" href="' . url('admin') . '/library/delete/' . $row->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
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
                ->addColumn('name', function ($row) {

                    $btn        = '';
                    $controller = 'library';
                    $btn        = '<a href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->name . '</a>';
                    return $btn;

                })
                ->rawColumns(['name'])
                ->addColumn('email', function ($row) {

                    $btn        = '';
                    $controller = 'library';
                    $btn        = '<a href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->email . '</a>';
                    return $btn;

                })
                ->rawColumns(['email'])
                ->make(true);
        }
        return view('admin.library.index');

    }

    public function create()
    {

        //$roles = Role::pluck('name','id')->all();
        $country   = Country::pluck('country_name', 'id')->all();
        $purpose   = Purpose::pluck('purpose', 'id')->all();
        $userroles = Role::all();
        $language  = Language::where('status', '1')->pluck('language', 'id')->all();
        $group     = Library::where('type', '2')->pluck('name', 'id')->all();

        $rolesIds = Usertyperole::where('type', 'TESt')->first();
        $roleid   = json_decode($rolesIds, true);
        $dataids  = $roleid['role_ids'];
        $roles    = Role::select('name', 'id')->whereIn('id', ["8", "9"])->get();
        $user = "";
        return view('admin.library.create', compact('roles', 'userroles', 'language', 'country', 'purpose', 'group','user'));
    }

    public function store(Request $request)
    {
        $rules = [
            'library'      => 'required',
            'email'        => 'required|email|',
            'userrole'     => 'required',
            'group'        => 'required',
            'availability' => 'required',
            'usertype' => 'integer',
            //'username'     => 'required',
            'useremail'    => 'required|email|unique:users,email',

        ];
        
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames(
                [
                    'usertype' => 'User Number'                    
                ]
            );
        $validator->validate();
        DB::beginTransaction();

        try {
            $result = $request->all();

            $userLog = array(
                "email"      => $result['useremail'],
                "name"       => $result['library'],
                "password"   => Hash::make(randomPass()),
                "user_type"  => "LIB",
                "created_at" => now(),
            );

            $user_id = User::insertGetId($userLog);
            DB::table('model_has_roles')->insert(
                ['role_id' => $result['userrole'], 'model_type' => 'App\User', 'model_id' => $user_id]
            );

            $basic = array(
                "userid"       => $user_id,
                "name"         => $result['library'],
                "groupid"      => $result['group'],
                "languageid"   => $result['language'],
                "logintype"    => $result['logintype'],
                "usernumber"   => $result['usertype'],
                "availability" => 1,
                "type"         => 1,
                "remark"       => $result['lremarks'],
                "created_at"   => now(),
            );
            $LibraryId = Library::insertGetId($basic);

            $contact = array(
                "userid"         => $user_id,
                "libraryid"      => $LibraryId,
                "contactname"    => $result['contactname'],
                "email"          => $result['email'],
                "phone"          => $result['phone'],
                "mobile"         => $result['mobile'],
                "website"        => $result['website'],
                "remotearena"    => $result['rarena'],
                "contactaddress" => $result['baddress'],
                "contactzip"     => $result['bzip'],
                "contactcountry" => $result['bcountry'],
                "contactcity"    => $result['bcity'],
                "postaladdress"  => $result['paddress'],
                "postalzip"      => $result['pzip'],
                "postalcountry"  => $result['pcountry'],
                "postalcity"     => $result['pcity'],
                "about_sve"      => $result['sveaboyt'],
                "about_eng"      => $result['engabout'],
                "created_at"     => now(),
            );
            LibraryContact::insert($contact);
            if (!empty($result['activeipstaus'])) {$ips = $result['activeipstaus'];} else { $ips = 3;}
            if (!empty($result['activeremoteip'])) {$rips = $result['remotename'];} else { $rips = 3;}
            $details = array(
                "libraryid"      => $LibraryId,
                "activeip"       => $ips,
                "remotename"     => $result['remotename'],
                "remoteactiveip" => $rips,
                "created_at"     => now(),
            );

            Librarylogin::insert($details);
            //print_r($result);exit;
            if (!empty($result['from1'])) {
                $i = 0;
                foreach ($result['from1'] as $form) {
                    $forms   = $result['from2'];
                    $formss  = $result['from3'];
                    $formsss = $result['from4'];
                    $to      = $result['to1'];
                    $too     = $result['to2'];
                    $tooo    = $result['to3'];
                    $toooo   = $result['to4'];
                    $fromips = $form . '.' . $forms[$i] . '.' . $formss[$i] . '.' . $formsss[$i] . '';
                    $toips   = $to[$i] . '.' . $too[$i] . '.' . $tooo[$i] . '.' . $toooo[$i] . '';

                    $ips = array(
                        "libraryid"  => $LibraryId,
                        "from"       => $fromips,
                        "to"         => $toips,
                        "created_at" => now(),
                    );
                    Libraryips::insert($ips);
                    $i++;
                }
            }

            if (!empty($result['remotedigit'])) {
                $i = 0;
                foreach ($request->post('remotedigit') as $digit) {
                    $remoteid    = $request->post('remoteid');
                    $remotedigit = $remoteid[$i];
                    if ($digit != strlen($remotedigit)) {
                        $output = ['class' => 'alert-danger',
                            'msg'              => __("Digit not qual to Library card "),
                        ];
                    } else {

                        $ips = array(
                            "libraryid"   => $LibraryId,
                            "remotedigit" => $digit,
                            "remoteid"    => $remoteid[$i],
                            "created_at"  => now(),
                        );

                        $query = Libraryremoteip::insert($ips);
                        $i++;
                    }
                }

            }

            $visit1 = Visit::savevisit($LibraryId, 1, 0);
            $visit2 = Visit::savevisit($LibraryId, 2, 0);
            $visit3 = Visit::savevisit($LibraryId, 3, 0);

            $output = ['class' => 'alert-position-success',
                'msg'              => __("Library added successfully"),
            ];
            DB::commit();
            return redirect('admin/library/' . $user_id . '/edit')->with('message', $output);

        } catch (\Exception $e) {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("Library Not create" . $e),
            ];
            DB::rollBack();
            //echo $e;
            return redirect('admin/library/create')->with('message', $output);
        }

        //  return redirect('admin/library')->with('status', $output);

    }

    public function edit($uid)
    {
        $basic     = Library::where('userid', $uid)->first();
        $user      = User::where('id', $uid)->first();
        $userroles = $user->roles->pluck('id', 'name')->first();
        //print_r($userroles);exit;
        $id      = $basic->id;
        $contact = LibraryContact::where('libraryid', $id)->first();
        //$roles = Role::pluck('name','id')->all();
        $country   = Country::pluck('country_name', 'id')->all();
        $purpose   = Purpose::pluck('purpose', 'id')->all();
        $language  = Language::where('status', '1')->pluck('language', 'id')->all();
        $group     = Library::where('type', '2')->pluck('name', 'id')->all();
        $details   = Librarylogin::where('libraryid', $id)->first();
        $ips       = Libraryips::where('libraryid', $id)->get();
        $remoteips = Libraryremoteip::where('libraryid', $id)->get();
        $logo      = Documents::where('userid', $id)->where('type', 'LIB')->where('filetype', 1)->first();
        $rolesIds  = Usertyperole::where('type', 'TESt')->first();
        $roleid    = json_decode($rolesIds, true);
        $dataids   = $roleid['role_ids'];
        $roles     = Role::select('name', 'id')->whereIn('id', ["8", "9"])->get();

        $today = Carbon::now();
        $month = $today->month;
        $year  = $today->year;

        $visit = Visit::WhereIn('type', [1, 2, 3])->where('library_id', $id)->where('year', $year)->get();

        if ($basic->status == 3) {
            $ips = array();
        }
        //print_r($ips);exit;
        return view('admin.library.edit', compact('roles', 'userroles', 'language', 'country', 'purpose', 'group', 'basic', 'contact', 'details', 'ips', 'remoteips', 'logo', 'user', 'visit'));
    }

    public function update(Request $request, $uid)
    {
        //print_r($request->all());exit;
        $basic = Library::where('userid', $uid)->first();

        $rules = [
            'library'      => 'required',
            'email'        => 'required|email|',
            'userrole'     => 'required',
            'group'        => 'required',
            'availability' => 'required',
            'usertype' => 'integer',
            //'username'     => 'required',
            'useremail'    => 'required|email|unique:users,email,' . $uid,

        ];
        
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames(
                [
                    'usertype' => 'User Number'                    
                ]
            );
        $validator->validate();
        
        DB::beginTransaction();
        try {

            $id     = $basic->id;
            $result = $request->all();

            $userLog = array(
                "email"      => $result['useremail'],
                "name"       => $result['library'],
                "updated_at" => Now(),
            );
            DB::table('users')->where('id', $uid)->update($userLog);
            //DB::enableQueryLog();
            DB::table('model_has_roles')->where('model_id', $uid)->update(
                ['role_id' => $result['userrole']]
            );
            //dd(DB::getQueryLog());
            $basic = array(

                "name"         => $result['library'],
                "groupid"      => $result['group'],
                "languageid"   => $result['language'],
                "logintype"    => $result['logintype'],
                "usernumber"   => $result['usertype'],
                "availability" => 1,
                "remark"       => $result['lremarks'],
                "updated_at"   => now(),
            );
            DB::table('library_basic')->where('id', $id)->update($basic);

            $contact = array(
                "contactname"    => $result['contactname'],
                "email"          => $result['email'],
                "phone"          => $result['phone'],
                "mobile"         => $result['mobile'],
                "website"        => $result['website'],
                "remotearena"    => $result['rarena'],
                "contactaddress" => $result['baddress'],
                "contactzip"     => $result['bzip'],
                "contactcountry" => $result['bcountry'],
                "contactcity"    => $result['bcity'],
                "postaladdress"  => $result['paddress'],
                "postalzip"      => $result['pzip'],
                "postalcountry"  => $result['pcountry'],
                "postalcity"     => $result['pcity'],
                "about_sve"      => $result['sveaboyt'],
                "about_eng"      => $result['engabout'],
                "updated_at"     => now(),
            );
            DB::table('library_contact')->where('libraryid', $id)->update($contact);
            if (!empty($result['remotename'])) {
                if (!empty($result['activeipstaus'])) {$ips = $result['activeipstaus'];} else { $ips = 3;}if (!empty($result['activeremoteip'])) {$rips = $result['remotename'];} else { $rips = 3;}
                $details = array(
                    "activeip"       => $ips,
                    "remotename"     => $result['remotename'],
                    "remoteactiveip" => $rips,
                    "updated_at"     => now(),
                );
                DB::table('librarylogin')->where('libraryid', $id)->update($details);
            }

            Libraryips::where('libraryid', $id)->delete();
            if (!empty($result['from1'])) {
                $i = 0;
                foreach ($result['from1'] as $form) {
                    $forms   = $result['from2'];
                    $formss  = $result['from3'];
                    $formsss = $result['from4'];
                    $to      = $result['to1'];
                    $too     = $result['to2'];
                    $tooo    = $result['to3'];
                    $toooo   = $result['to4'];
                    $fromips = $form . '.' . $forms[$i] . '.' . $formss[$i] . '.' . $formsss[$i] . '';
                    $toips   = $to[$i] . '.' . $too[$i] . '.' . $tooo[$i] . '.' . $toooo[$i] . '';

                    $ips = array(
                        "libraryid"  => $id,
                        "from"       => $fromips,
                        "to"         => $toips,
                        "created_at" => now(),
                    );
                    Libraryips::insert($ips);
                    $i++;}
            }

            if (!empty($result['remotedigit'])) {
                Libraryremoteip::where('libraryid', $id)->delete();
                $i = 0;
                foreach ($request->post('remotedigit') as $digit) {
                    $remoteid    = $request->post('remoteid');
                    $remotedigit = $remoteid[$i];
                    if ($digit != strlen($remotedigit)) {
                        $output = ['class' => 'alert-danger',
                            'msg'              => __("Digit not qual to Library card "),
                        ];
                        //return redirect('library/manage/remote-access')->with('message', $output);
                    } else {

                        $ips = array(
                            "libraryid"   => $id,
                            "remotedigit" => $digit,
                            "remoteid"    => $remoteid[$i],
                            "created_at"  => now(),
                        );

                        $query = Libraryremoteip::insert($ips);
                        $i++;
                    }
                }

            }

            if (!empty($request->file('logoImg'))) {
                $imageName = time() . '.' . request()->logoImg->getClientOriginalExtension();
                request()->logoImg->move(public_path('uploads/images'), $imageName);
                $datalogo = array(
                    'userid'     => $id,
                    'name'       => $imageName,
                    'type'       => 'LIB',
                    'filetype'   => 1,
                    'created_at' => now(),
                );
                Documents::insert($datalogo);
            }
            $output = ['success' => true,
                        'msg'    => __("Library updated"),
            ];
            DB::commit();return redirect('admin/library/' . $uid . "/edit")->with('status', $output);
        } catch (\Exception $e) {

            $output = ['success' => false,
                'msg'                => __("messages.something_went_wrong"),
            ];
            DB::rollBack();
            return redirect('admin/library' . $uid . "/edit")->with('status', $output);
        }

    }

    public function delete($uid)
    {
        try {
            $basic = Library::where('userid', $uid)->first();
            $id    = $basic->id;
            /* User::where('id', $uid)->delete();
            Library::where('id', $id)->delete();
            LibraryContact::where('libraryid', $id)->delete();
            Libraryremoteip::where('libraryid', $id)->delete();
            Libraryips::where('libraryid', $id)->delete();
            Libraryips::where('libraryid', $id)->delete(); */
            $data = array(
                'name'   => 'DELETE_' . $uid . '@globalgarnt.com',
                'status' => 3,
                'email'  => 'DELETE_' . $uid . '@globalgarnt.com',
            );
            DB::table('users')->where('id', $uid)->update($data);
            Library::delete_data($uid);
            LibraryContact::delete_data($uid);
            Libraryips::delete_data($basic->id);
            Librarylogin::delete_data($basic->id);
            Libraryremoteip::delete_data($basic->id);

            $output = ['success' => true,
                'msg'                => __("Module Field Deleted"),
            ];
        } catch (\Exception $e) {
            //echo $e;
            $output = ['success' => false,
                'msg'                => __("messages.something_went_wrong"),
            ];
        }
        return redirect('admin/library')->with('status', $output);
    }

    public function get_reportdata(Request $request)
    {
        $result = $request->all();
        $today  = Carbon::now();
        $month  = $today->month;
        //$year = $today->year;

        $id   = $result['data'];
        $year = $result['year'];
        $data = Visit::WhereIn('type', [1, 2, 3])->where('library_id', $id)->where('year', $year)->get();

        //print_r($data);exit;
        if ($request->ajax()) {

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('type', function ($row) {

                    if ($row->type == 1) {$btn = 'Visit IP-User';}
                    if ($row->type == 2) {$btn = 'Visit Remote-Access';}
                    if ($row->type == 3) {$btn = 'Visit Page-View';}

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }

}
