<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables;
use DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
		
		
	}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('admin.roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }*/
    public function index(Request $request) {

        if ($request->ajax()) {
            $data = Role::where('deleted','!=','1')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
						$btn = '<a href="'.url('admin').'/roles/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
						if($row->main_role != '1')
						{
                          $btn .= '<a href="'.url('admin').'/roles/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
						}
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       return view('admin.roles.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$controllers = array(
			'Role' => 'RoleController',
			'Users' => 'UserController',
			'Foundation'=>'FoundationController',
			'Settings' => 'SettingsController',
			'Module' => 'ModuleController',
			'Module Field' => 'ModuleFieldController',
			'Module Field Value' => 'ModuleFieldValueController',
			'Country Block' => 'CountryBlockController',
			'Country' => 'CountryController',
			'Region' => 'RegionController',
			'City' => 'CityController',
			'Language' => 'LanguageController',
			'Label' => 'LabelController',
			'Pages' => 'PagesController',
			'Translation' => 'TranslationController',
			'Permission' => 'PermissionController',
			'Subscription' => 'SubscriptionController',
			'Payment' => 'PaymentController',
			'Office' => 'OfficeController',
			'Product' => 'SproductController',
			'Hitlist' => 'HitlistController',
			'Purpose' => 'PurposeController',
			'Individual' => 'IndividualController',
			'Library' => 'LibraryController',
			'Library Group' => 'LibraryGroupController',
			'Oganization' => 'OganizationController',
			'Subscription Type' => 'SubscriptiontypeController',
			'Subject' => 'SubjectController',
			'Transaction' => 'TransactionController',
			'Order' => 'OrderController',
			'Menu' => 'MenuController'
		
		);
		$extraPermission = array(
			'User List' => 'UserseachController-listalluser',
			'Foundation Export' => 'FoundationController-exports',
			'Footer Menu' => 'MenuController-createfooter',
			'Order Search' => 'OrderController-getorderbystatus',
			'Order Change Status' => 'OrderController-changestatus',
			'Transaction Search' => 'TransactionController-searchtransactiondata',
			'Subscription Change Status' => 'SubscriptiontypeController-changestatus',
			'LibraryGroup Change Status' => 'LibraryGroupController-changestatus',
			'Individual Change Status' => 'IndividualController-updateaction',
			'Hitlist Change Status' => 'HitlistController-changestatus',
			'Hitlist Change Status' => 'SproductController-changestatus',
			'Subscription Search' => 'SubscriptionController-getsubsbystatus',
			'Subscription Change Status' => 'SubscriptionController-changestatus',
			'Foundation Export Search' =>'FoundationController-search_export_foundation',
			'foundation Multidelete' => 'FoundationController-multidelete'
		); 
        $permission = Permission::get();
        return view('admin.roles.create',compact('permission','controllers','extraPermission'));
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
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
			'usertype' => 'required',
        ]);
		
		//print_r($request->all());exit;
		
		if($request->input('usertype') == 1){
			$link = "/admin";
		}else{
			$link = "/profile";
		}
		//echo $link;exit;
        $role = Role::create(['name' => $request->input('name'),'link' => $link]);
        $role->syncPermissions($request->input('permission'));


        return redirect('admin/roles')
                        ->with('success','Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();


        return view('admin.roles.show',compact('role','rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$controllers = array(
			'Role' => 'RoleController',
			'Users' => 'UserController',
			'Foundation' =>'FoundationController',
			'Settings' => 'SettingsController',
			'Module' => 'ModuleController',
			'Module Field' => 'ModuleFieldController',
			'Module Field Value' => 'ModuleFieldValueController',
			'Country Block' => 'CountryBlockController',
			'Country' => 'CountryController',
			'Region' => 'RegionController',
			'City' => 'CityController',
			'Language' => 'LanguageController',
			'Label' => 'LabelController',
			'Pages' => 'PagesController',
			'Translation' => 'TranslationController',
			'Permission' => 'PermissionController',
			'Subscription' => 'SubscriptionController',
			'Payment' => 'PaymentController',
			'Office' => 'OfficeController',
			'Product' => 'SproductController',
			'Hitlist' => 'HitlistController',
			'Purpose' => 'PurposeController',
			'Individual' => 'IndividualController',
			'Library' => 'LibraryController',
			'Library Group' => 'LibraryGroupController',
			'Oganization' => 'OganizationController',
			'Subscription Type' => 'SubscriptiontypeController',
			'Subject' => 'SubjectController',
			'Transaction' => 'TransactionController',
			'Order' => 'OrderController',
			'Menu' => 'MenuController'
		
		);
		$extraPermission = array(
			'User List' => 'UserseachController-listalluser',
			'Foundation Export' => 'FoundationController-exports',
			'Footer Menu' => 'MenuController-createfooter',
			'Order Search' => 'OrderController-getorderbystatus',
			'Order Change Status' => 'OrderController-changestatus',
			'Transaction Search' => 'TransactionController-searchtransactiondata',
			'Subscription Change Status' => 'SubscriptiontypeController-changestatus',
			'LibraryGroup Change Status' => 'LibraryGroupController-changestatus',
			'Individual Change Status' => 'IndividualController-updateaction',
			'Hitlist Change Status' => 'HitlistController-changestatus',
			'Hitlist Change Status' => 'SproductController-changestatus',
			'Subscription Search' => 'SubscriptionController-getsubsbystatus',
			'Subscription Change Status' => 'SubscriptionController-changestatus',
			'Foundation Export Search' =>'FoundationController-search_export_foundation',
			'foundation Multidelete' => 'FoundationController-multidelete',
			'Orgnization Change Status' => 'UserseachController-updateaction'
		); 
		
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit',compact('role','permission','rolePermissions','controllers','extraPermission'));
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
            'permission' => 'required',
        ]);
		//print_r($request->input());exit;
		$request->input('name');
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect('admin/roles')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect('admin/roles')
                        ->with('success','Role deleted successfully');
    }
}