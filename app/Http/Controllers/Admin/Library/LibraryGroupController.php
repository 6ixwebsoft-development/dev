<?php

namespace App\Http\Controllers\Admin\Library;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\LibraryContact;
use App\Models\Library;

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

class LibraryGroupController extends Controller
{
   public function index(Request $request) {
        if ($request->ajax()) {
            $data = Library::select('id', 'name')->where('type','2')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/librarygroup/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/librarygroup/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.librarygroup.index');
    }
	
	
	public function create()
    {
		
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$userroles = Role::all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
        return view('admin.librarygroup.create',compact('roles','userroles','language','country','purpose'));
    }
	
	
	 public function store(Request $request)
    {   
		DB::beginTransaction();
        try {
            $result = $request->all();
			//print_r($result);exit;
			
			
            $basic = array(
                    "userid" => 0,
                    "name"  => $result['library'],
                    "groupid"  => null,
                    "languageid"  => $result['language'],
                    "logintype"  => null,
                    "usernumber"  => null,
                    "availability"  => 1,
                    "type"  => 2,
                    "remark"  => $result['lremarks'],
                    "created_at"  =>now(),
            );
            $LibraryId = Library::insertGetId($basic);
            
			  $contact = array(
					"userid" => null,
					"libraryid"  =>  $LibraryId,
					"contactname"  => $result['contactname'],
					"email"  => $result['email'],
					"phone"  => $result['phone'],
					"mobile"  => $result['mobile'],
					"website"  => $result['website'],
					"remotearena"  => null,
					"contactaddress"  => $result['baddress'],
					"contactzip"  => $result['bzip'], 
					"contactcountry"  => $result['bcountry'],
					"contactcity"  => $result['bcity'],
					"postaladdress"  => $result['paddress'],
					"postalzip"  => $result['pzip'],
					"postalcountry"  => $result['pcountry'],
					"postalcity"  => $result['pcity'],
					"about_sve"  => null,
					"about_eng"  => null,					
					"created_at"  =>NOW(),
			);
			LibraryContact::insert($contact);

		
		 DB::commit();
		$output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
		  return redirect('admin/librarygroup')->with('status', $output);
		  
        } catch (\Exception $e) {
			
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
			DB::rollBack();
			//echo $e;
		  return redirect('admin/librarygroup')->with('status', $output);
        }

      

    }
	
	public function edit($id)
	{
		$basic = Library::where('id',$id)->first();
		$contact = LibraryContact::where('libraryid',$id)->first();
		$roles = Role::pluck('name','id')->all();
		$country = Country::pluck('country_name','id')->all();
		$purpose = Purpose::pluck('purpose','id')->all();
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		return view('admin.librarygroup.edit',compact('roles','userroles','language','country','purpose','basic','contact'));
	}
	
	public function update(Request $request, $id) 
	{
		DB::beginTransaction();
		try {
			$result = $request->all();
			
				$basic = array(
                    "userid" => null,
                    "name"  => $result['library'],
                    "groupid"  => null,
                    "languageid"  => $result['language'],
                    "logintype"  => null,
                    "usernumber"  =>null,
                    "availability"  => 1,
                    "remark"  => $result['lremarks'],
                    "updated_at"  =>now(),
				);
				DB::table('library_basic')->where('id', $id)->update($basic);
				
				$contact = array(
					"contactname"  => $result['contactname'],
					"email"  => $result['email'],
					"phone"  => $result['phone'],
					"mobile"  => $result['mobile'],
					"website"  => $result['website'],
					"remotearena"  => null,
					"contactaddress"  => $result['baddress'],
					"contactzip"  => $result['bzip'], 
					"contactcountry"  => $result['bcountry'],
					"contactcity"  => $result['bcity'],
					"postaladdress"  => $result['paddress'],
					"postalzip"  => $result['pzip'],
					"postalcountry"  => $result['pcountry'],
					"postalcity"  => $result['pcity'],
					"about_sve"  => null,
					"about_eng"  => null,					
					"updated_at"  =>now(),
			);
			DB::table('library_contact')->where('libraryid', $id)->update($contact);
			
		DB::commit();
		$output = ['success' => true,
					'msg' => __("Individual updated")
					];
		return redirect('admin/librarygroup')->with('status', $output);
		} catch (\Exception $e) {
		
			$output = ['success' => false,
						'msg' => __("messages.something_went_wrong")
					];
			DB::rollBack();
			//echo $e;
			return redirect('admin/librarygroup')->with('status', $output);
		}

		
	}
	
	public function delete($id)
	{
		try {			
			Library::where('id', $id)->delete();
			LibraryContact::where('libraryid', $id)->delete();
			$output = ['success' => true,
						'msg' => __("Module Field Deleted")
						];
		} catch (\Exception $e) {
		
			$output = ['success' => false,
						'msg' => __("messages.something_went_wrong")
					];
		}
		return redirect('admin/librarygroup')->with('status', $output);
	}
	
	
}
