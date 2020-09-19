<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\IndividualContact;
use App\Models\Language;
use App\Models\LibraryContact;
use App\Models\Userinfo;
use App\Rules\StrongPassword;
use App\User;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {

    $data = User::orderBy('id','DESC')->paginate(5);
    return view('admin.users.index',compact('data'))
    ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/
    public function index(Request $request)
    {

        if ($request->ajax()) {

            $data = User::orderBy('id', 'DESC')->where('status', '1')->where('user_type', '!=', 'ADMIN')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('roles', function ($row) {
                    $s_btn = '';
                    if (!empty($row->getRoleNames())) {
                        foreach ($row->getRoleNames() as $v) {
                            //$s_btn = '<label class="badge badge-success">'. $v .'</label>';
                            $s_btn = $v;
                        }
                    }

                    return $s_btn;
                })
                ->escapeColumns([])
                ->addColumn('action', function ($row) {

                    $btn = '';
                    if (!empty($row->user_type)) {
                        $controller = '';
                        if ($row->user_type == 'LIB') {$controller = 'library';}
                        if ($row->user_type == 'ORG') {$controller = 'organization';}
                        if ($row->user_type == 'IND') {$controller = 'individual';}
                        if ($controller = 'organization' || $controller = 'individual') {
                            if ($row->user_type == 'LIB' || $row->user_type == 'IND' || $row->user_type == 'ORG') {
                                $btn = '<a href="' . url('admin') . '/order/create/' . $row->id . '/' . $row->user_type . '" class="edit btn btn-warning btn-sm">Order</a>
									<a href="' . url('admin') . '/subscription/create/' . $row->id . '/' . $row->user_type . '" class="edit btn btn-info btn-sm">Subscribe</a>';
                            }
                            if ($row->status == '1') {
                                $btn .= '<button href="" class="edit btn btn-danger btn-sm" onClick="getalllistcheckboxval(0,' . $row->id . ');">Inactivate</button>';
                            } else {
                                $btn .= '<a href="" onClick="getalllistcheckboxval(1,' . $row->id . ');" class="edit btn btn-success btn-sm">Activate</a>';
                            }

                        }

                    }
                    if (!empty($row->foundation_id)) {
                        $controller = 'foundation';
                        $btn        = '';
                    }
                    if (!empty($row->libraryid)) {
                        $controller = 'librarygroup';
                        $btn        = '<a href="' . url('admin') . '/order/subscription/' . $row->id . '/LIB" class="edit btn btn-info btn-sm">Subscribe</a>';
                        if ($row->status == '1') {
                            $btn .= '<a href="" onClick="getLibGrpStatus(0,' . $row->id . ');" class="edit btn btn-danger btn-sm">Inactivate</a>';
                        } else {
                            $btn .= '<a href="" onClick="getLibGrpStatus(1,' . $row->id . ');" class="edit btn btn-success btn-sm">Activate</a>';
                        }

                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->addColumn('name', function ($row) {
                    $btn = '';
                    if (!empty($row->user_type)) {
                        $controller = '';

                        // if ($row->user_type == 'LIB') {$controller = 'library';}
                        // if ($row->user_type == 'ORG') {$controller = 'organization';}
                        // if ($row->user_type == 'IND') {$controller = 'individual';}
                        switch ($row->user_type) {
                            case 'LIB':
                                    $controller = 'library';
                                break;

                            case 'ORG':
                                    $controller = 'organization';
                                break;

                            case 'IND':
                                    $controller = 'individual';
                                break;

                            case 'STAFF':
                                    $controller = 'users';
                                break;                                    
                            
                            default:
                                    $controller = 'users';
                                break;
                        }
                    }
                    if (!empty($row->foundation_id)) {
                        $controller = 'foundation';
                    }
                    if (!empty($row->libraryid)) {
                        $controller = 'librarygroup';
                    }


                    $btn = '<a  href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->name . '</a>';

                    return $btn;
                })
                ->rawColumns(['name'])
                ->escapeColumns([])
                ->addColumn('email', function ($row) {
                   $btn = '';
                    if (!empty($row->user_type)) {
                        $controller = '';
                        
                        // if ($row->user_type == 'LIB') {$controller = 'library';}
                        // if ($row->user_type == 'ORG') {$controller = 'organization';}
                        // if ($row->user_type == 'IND') {$controller = 'individual';}
                        switch ($row->user_type) {
                            case 'LIB':
                                    $controller = 'library';
                                break;

                            case 'ORG':
                                    $controller = 'organization';
                                break;

                            case 'IND':
                                    $controller = 'individual';
                                break;

                            case 'STAFF':
                                    $controller = 'users';
                                break;                                    
                            
                            default:
                                    $controller = 'users';
                                break;
                        }
                    }
                    if (!empty($row->foundation_id)) {
                        $controller = 'foundation';
                    }
                    if (!empty($row->libraryid)) {
                        $controller = 'librarygroup';
                    }


                    $btn = '<a  href="' . url('admin') . '/' . $controller . '/' . $row->id . '/edit" class="">' . $row->name . '</a>';

                    return $btn;
                })
                ->rawColumns(['email'])
                ->escapeColumns([])
                ->addColumn('created_at', function ($row) {

                    if (!empty($row->created_at)) {

                        $datefor = date('F d Y, h:i A', strtotime($row->created_at));
                        $btn     = '<span class="">' . $datefor . '</span>';

                    } else {
                        $btn = '----';
                    }
                    return $btn;
                })
                ->rawColumns(['created_at'])
                ->escapeColumns([])
                ->addColumn('updated_at', function ($row) {

                    if (!empty($row->updated_at)) {
                        $datefor = date('F d Y, h:i A', strtotime($row->updated_at));
                        $btn     = '<span class="">' . $datefor . '</span>';
                    } else {
                        $btn = '----';
                    }
                    return $btn;
                })
                ->rawColumns(['updated_at'])
                ->escapeColumns([])
                ->addColumn('user_type', function ($row) {

                    if ($row->user_type == 'IND') {
                        $type = "Individual";
                    } else if ($row->user_type == 'LIB') {
                        $type = "Library";
                    } else if ($row->user_type == 'ORG') {
                        $type = "Organization";
                    } else {
                        $type = "";
                    }
                    return $btn = '<span class="">' . $type . '</span>';
                })
                ->rawColumns(['user_type'])
                ->escapeColumns([])
                ->addColumn('mobile', function ($row) {

                    if ($row->user_type == 'IND') {
                        $mobile = IndividualContact::get_mobile($row->id);
                    } else if ($row->user_type == 'LIB') {
                        $mobile = LibraryContact::get_mobile($row->id);
                    } else if ($row->user_type == 'ORG') {
                        $mobile = LibraryContact::get_mobile($row->id);
                    } else {
                        $mobile = "";
                    }
                    return $btn = '<span class="">' . $mobile . '</span>';
                })
                ->rawColumns(['mobile'])
                ->make(true);
        }

        $roles        = Role::where('deleted', '!=', '1')->get();
        $totaluser    = User::count();
        $activeuser   = User::where('status', 1)->count();
        $inactiveuser = User::where('status', 0)->count();
        $language     = Language::where('status', '1')->pluck('language', 'id')->all();
        return view('admin.users.index', compact('roles', 'activeuser', 'inactiveuser', 'totaluser', 'language'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles     = Role::whereIn('id', [1, 16, 17])->get();
        $userroles = Role::all();
        return view('admin.users.create', compact('roles', 'userroles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'password' => new StrongPassword,
            'roles'    => 'required',
        ]);

        $input = $request->all();
        //print_r($input);exit;
        $input['password'] = Hash::make($input['password']);
        //$userinfo['fname'] = $login['name'];
        $input['user_type'] = 'STAFF';
        // print_r($input);exit;

        $datasave = array(
            'name'      => $input['name'],
            'email'     => $input['email'],
            'password'  => $input['password'],
            'user_type' => 'STAFF',

        );

        $user_id = User::insertGetId($datasave);
        DB::table('model_has_roles')->insert(
            ['role_id' => $input['roles'], 'model_type' => 'App\User', 'model_id' => $user_id]
        );
        /* $user= User::Create($datasave);
        if(!empty($input['roles'])){
        $role = $input['roles'];
        }else{
        $role = 'User10 - Registered Free User';
        } */

        /*  $userdata = array(
        "userid" => $userId,
        "fname"  => $input['name'],
        );
        $userinfo = Userinfo::insert($userdata);  */

        return Redirect::to('admin/users/' . $user_id . '/edit')->with('success', 'User created successfully');
        //return redirect()->route('admin.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        //print_r($user);exit;
        $roles = Role::whereIn('id', [1, 16, 17])->get();

        $info = Userinfo::where('userid', $id)->first();

        $userRole = $user->roles->pluck('id', 'name')->all();
        //print_r($userRole);exit;
        $userroles = Role::all();
        /* return view('admin.users.edit',compact('user','userroles','info')); */
        return view('admin.users.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        //dd($input);
        $rules = [
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required'
        ];

        if(!empty($input['password'])){
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed', new StrongPassword];
        }

        $this->validate($request, $rules);

        
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
            $datasave          = array(
                'name'     => $input['name'],
                'email'    => $input['email'],
                'password' => $input['password'],
            );
        } else {
            $datasave = array(
                'name'  => $input['name'],
                'email' => $input['email'],
            );
        }

        DB::table('users')->where('id', $id)->update($datasave);
        //DB::enableQueryLog();
        DB::table('model_has_roles')->where('model_id', $id)->update(
            ['role_id' => $input['roles']]
        );
        $output = ['class' => 'alert-position-success',
                    'msg' => __("User Updated Successfully")
                    ];

        return Redirect::to('admin/users/' . $id . '/edit')->with('message',$output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }

    public function searchvikashuser(Request $request)
    {
        print_r($request->all());exit;
        if ($request->ajax()) {
            $query = User::orderBy('id');
            if (!empty($request->input('userRole'))) {
                $query = User::role($request->input('userRole'));
                if (!empty($request->input('searchtext'))) {
                    $query = $query->where('name', $request->input('searchtext'));
                }
            } else {

                if (!empty($request->input('createdFrom')) || !empty($request->input('createdTo'))) {
                    $query = $query->whereBetween('created_at', array($request->input('createdFrom'), $request->input('createdTo')));
                }

                if (!empty($request->input('modifiesFrom')) || !empty($request->input('modifiesTo'))) {
                    $query = $query->whereBetween('updated_at', array($request->input('modifiesFrom'), $request->input('modifiesTo')));
                }

                if (!empty($request->input('searchtext')) && empty($request->input('searchtext'))) {
                    $query = $query->where('name', 'LIKE', '%' . $request->input('searchtext') . '%');
                    if (!empty($request->input('statususer'))) {
                        $query = $query->where('status', $request->input('statususer'));
                    }
                }

                if (!empty($request->input('searchtext')) && !empty($request->input('emailcheck'))) {
                    $query = $query->where('email', $request->input('searchtext'));
                    if (!empty($request->input('statususer'))) {
                        $query = $query->where('status', $request->input('statususer'));
                    }
                }

            }

            //DB::enableQueryLog();
            $data = $query->get();
            //dd(DB::getQueryLog());

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

                    $btn = '<a href="' . url('admin') . '/users/' . $row->id . '/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="' . url('admin') . '/users/delete/' . $row->id . '" class="delete btn btn-primary btn-sm">Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])

                ->make(true);
        }
        $roles = Role::all();
        return view('admin.users.index', compact('roles'));
    }

    public function passwordactive(Request $request)
    {
        $id       = $request->input('id');
        $password = $request->input('password');


        // $user = User::find($id);

        // $user->password = Hash::make($password);

        // $query = $user->save();

        $error = validator(['password' => $password], [            
            'password' => ['required', 'string', 'min:8', new StrongPassword]
        ])->errors()->getMessages();

        if(!empty($error)){
            return json_encode(['status' => 0,"errors" => $error]);    
        }
        

        

        $pass     = Hash::make($password);
        $userdata = array(
            'status'   => 1,
            'password' => $pass,
        );

        $query = DB::table('users')->where('id', $id)->update($userdata);
        return $query;

    }

    public function roles_check()
    {
        // $password = "LzHN!a@Tod#K";
        // echo $pass = Hash::make($password);
        // die();
        $d = auth()->user()->getRoleNames();

        foreach ($d as $row) {
            print_r($row);
        }
    }

}
