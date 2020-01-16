<?php


namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Userinfo;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use App\Models\Language;
use DataTables;
use DB;
use Hash;


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
    public function index(Request $request) {

        if ($request->ajax()) {
         
            $data = User::where('user_type','!=',null)->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('roles', function($row) {
                         $s_btn = '';
                        if(!empty($row->getRoleNames())){
                           foreach($row->getRoleNames() as $v) {
                            $s_btn = '<label class="badge badge-success">'. $v .'</label>';
                            } 
                        }
                            
                      return  $s_btn;
                    })
                   ->escapeColumns([])
                   ->addColumn('action', function($row){
						
						    $btn ='';
							if(!empty($row->user_type)){
							$controller = '';
							if($row->user_type == 'LIB'){$controller = 'library';}
							if($row->user_type == 'ORG'){$controller = 'organization';}
							if($row->user_type == 'IND'){$controller = 'individual';}
							if($controller = 'organization' || $controller = 'individual')
							{
								if($row->user_type != 'LIB')
								{
									$btn = '<a href="'.url('admin').'/order/create/'.$row->id.'/'.$row->user_type.'" class="edit btn btn-warning btn-sm">Order</a>
									<a href="'.url('admin').'/subscription/create/'.$row->id.'/'.$row->user_type.'" class="edit btn btn-info btn-sm">Subscribe</a>';
								}
								$btn .= '<button href="" class="edit btn btn-danger btn-sm" onClick="getalllistcheckboxval(0,'.$row->id.');">Inactive</button>';
							}
							
							}
							if(!empty($row->foundation_id))
							{
								$controller = 'foundation';
								$btn = '';
							}
							if(!empty($row->libraryid))
							{
								$controller = 'librarygroup';
								$btn = '<a href="'.url('admin').'/order/subscription/'.$row->id.'/LIB" class="edit btn btn-info btn-sm">Subscribe</a>
								<a href="" onClick="getLibGrpStatus(0,'.$row->id.');" class="edit btn btn-danger btn-sm">Inactive</a>
								';
							}
						
                           
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
					 ->escapeColumns([])
                    ->addColumn('name', function($row){
							$btn ='';
							if(!empty($row->user_type)){
							$controller = '';
							if($row->user_type == 'LIB'){$controller = 'library';}
							if($row->user_type == 'ORG'){$controller = 'organization';}
							if($row->user_type == 'IND'){$controller = 'individual';}
							$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';
							}
							if(!empty($row->foundation_id))
							{
								$controller = 'foundation';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';
							}
							if(!empty($row->libraryid))
							{
								$controller = 'librarygroup';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';
							}
						
                            return $btn;
                    })
                    ->rawColumns(['name'])
                    ->make(true);
        }
		
       $roles = Role::all();
	   $totaluser = User::count();
	   $activeuser = User::where('status',1)->count();
	   $inactiveuser = User::where('status',0)->count();
	   $language = Language::where('status','1')->pluck('language', 'id')->all();
       return view('admin.users.index',compact('roles','activeuser','inactiveuser','totaluser','language'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$roles = Role::pluck('name','name')->all();
		$userroles = Role::all();
        return view('admin.users.create',compact('roles','userroles'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]); 
		//print_r($request->all());exit; 
		/* echo $login->password;exit; */
			/* $userinfo = $request->input('user');
			$login = $request->input('login');
			
			
			$this->validate($request, [
				'login.name' => 'required',
				'login.email' => 'required|email|unique:users,email',
				'user.roles' => 'required'
			]); */
			
				/* if($errors->has()){
				foreach ($errors->all() as $error){
					echo $error;
				}
				} */

         $input = $request->all(); 
        /* $login['password'] = Hash::make($login['password']);
		$userinfo['fname'] = $login['name'];
		 */
		$user= User::Create($input);
		$user->assignRole($input['roles']);
		$userId = $user->id;
		
		/* $userdata = array(
                    "userid" => $userId,
                    "fname"  => $userinfo['fname'],
                    "mname"  => $userinfo['middlename'],
                    "lname"  => $userinfo['lastname'],
					"age"   =>  $userinfo['age'],
                    "dateofbirth"  => $userinfo['birthdate'],
                    "language"  => $userinfo['language'],
					"availability" => $userinfo['availability'],
                    "streetaddress"  => $userinfo['streetaddress'],
                    "zipcode"  => $userinfo['zipcode'],
                    "country"  => $userinfo['country'],
                    "personal"  => $userinfo['personal'],
                    "mobile"  => $userinfo['mobile'],
					"phone" => $userinfo['phone'],
                    "librarycity"  => $userinfo['librarycity'],
					"librarycard"  => $userinfo['librarycard'],
                    "librarynumber"  => $userinfo['language'],
					"comment" =>  $userinfo['comment'],
                    "purpose"  => $userinfo['purpose'],
                    "studymajor"  => $userinfo['studymajor'],
                    "degree"  => $userinfo['degree'],
					"school" => $userinfo['school'],
                    "location"  => $userinfo['location'],
                    "startdate"  => $userinfo['startdate'],
                    "enddate"  => $userinfo['enddate'],
                    "govtsupport"  => $userinfo['govtsupport'],
                    
            );
		$userinfo = Userinfo::insert($userdata); */
		
		
		return Redirect::to('admin/users')->with('success','User created successfully');
       // return redirect()->route('admin.users.index')->with('success','User created successfully');
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
        
        return view('admin.users.show',compact('user'));
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
        $roles = Role::pluck('name','name')->all();

		$info = Userinfo::where('userid', $id)->first();
		
        $userRole = $user->roles->pluck('name','name')->all();
		
		 $userroles = Role::all();
		 /* return view('admin.users.edit',compact('user','userroles','info')); */
         return view('admin.users.edit',compact('user','roles','userRole')); 
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
		
		$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]); 
		
		
			/* $userinfo = $request->input('user');
			$login = $request->input('login');
			
			
			$this->validate($request, [
				'login.name' => 'required',
				'login.email' => 'required|email|unique:users,email,'.$id,
				'user.roles' => 'required'
			]);
			 */
			
			/* $userdata = array(
                    "userid" => $id,
                    "fname"  => $login['name'],
                    "mname"  => $userinfo['middlename'],
                    "lname"  => $userinfo['lastname'],
					"age"   =>  $userinfo['age'],
                    "dateofbirth"  => $userinfo['birthdate'],
                    "language"  => $userinfo['language'],
					"availability" => $userinfo['availability'],
                    "streetaddress"  => $userinfo['streetaddress'],
                    "zipcode"  => $userinfo['zipcode'],
                    "country"  => $userinfo['country'],
                    "personal"  => $userinfo['personal'],
                    "mobile"  => $userinfo['mobile'],
					"phone" => $userinfo['phone'],
                    "librarycity"  => $userinfo['librarycity'],
					"librarycard"  => $userinfo['librarycard'],
                    "librarynumber"  => $userinfo['language'],
					"comment" =>  $userinfo['comment'],
                    "purpose"  => $userinfo['purpose'],
                    "studymajor"  => $userinfo['studymajor'],
                    "degree"  => $userinfo['degree'],
					"school" => $userinfo['school'],
                    "location"  => $userinfo['location'],
                    "startdate"  => $userinfo['startdate'],
                    "enddate"  => $userinfo['enddate'],
                    "govtsupport"  => $userinfo['govtsupport']  
            ); */
			
       $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
		

        $user = User::find($id);
        //$user->update($login);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($input['roles']);
		
		//DB::table('userinfo')->where('userid', $id)->update($userdata);

			return Redirect::to('admin/users')->with('success','User updated successfully');
			// return redirect()->route('admin.users.index')
           //return view('admin.users.index')->with('success','User updated successfully');
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
                        ->with('success','User deleted successfully');
    }

	public function searchvikashuser(Request $request)
	{
		print_r($request->all());exit;
	if ($request->ajax()) {
		$query = User::orderBy('id');
		if(!empty($request->input('userRole')))
		{		   
			$query = User::role($request->input('userRole'));
			if(!empty($request->input('searchtext')))
				{
					$query = $query->where('name',$request->input('searchtext'));
				}	
		}
		else{
			
			
			if(!empty($request->input('createdFrom')) || !empty($request->input('createdTo')))
				{
					$query = $query->whereBetween('created_at', array($request->input('createdFrom'), $request->input('createdTo')));
				}
				
			if(!empty($request->input('modifiesFrom')) || !empty($request->input('modifiesTo')))
				{
					$query = $query->whereBetween('updated_at', array($request->input('modifiesFrom'), $request->input('modifiesTo')));
				}
				
			if(!empty($request->input('searchtext')) && empty($request->input('searchtext')))
			{
				$query = $query->where('name','LIKE','%'.$request->input('searchtext').'%');
				if(!empty($request->input('statususer')))
				{
					$query = $query->where('status',$request->input('statususer'));
				}	
			}
			
			if(!empty($request->input('searchtext')) && !empty($request->input('emailcheck')))
			{
				$query = $query->where('email',$request->input('searchtext'));
				if(!empty($request->input('statususer')))
				{
					$query = $query->where('status',$request->input('statususer'));
				}	
			}
			
			
			
		}

			//DB::enableQueryLog(); 
			$data = $query->get();
			//dd(DB::getQueryLog());		
				
				return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('roles', function($row) {
                         $s_btn = '';
                        if(!empty($row->getRoleNames())){
                           foreach($row->getRoleNames() as $v) {
                            $s_btn = '<label class="badge badge-success">'. $v .'</label>';
                            } 
                        }
                            
                      return  $s_btn;
                    })
                   ->escapeColumns([])
                    ->addColumn('action', function($row){
   
                          $btn = '<a href="'.url('admin').'/users/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/users/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
					
                    ->make(true);
        }
       $roles = Role::all();
       return view('admin.users.index',compact('roles'));
	}
	
	public function passwordactive(Request $request)
	{
		$id = $request->input('id');
		$userdata = array(
		'status' => 1,
		'password' => Hash::make($request->input('password'))
		);
 		$query = DB::table('users')->where('id', $id)->update($userdata);
		return  $query;exit;
		
	}
	
}