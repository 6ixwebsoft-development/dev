<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Foundation;
use App\Models\Library;
use App\Models\FoundationContact;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Redirect;
use DataTables;
use DB;
use Hash;

class UserseachController extends Controller
{
   public function searchuserdata(Request $request)
	{
		$data = array();
		$mydata = array();
		$libraryg = array();
		$donor =array();
		$users = array();
		
		$input = $request->all();
		$userTypes = $input['usertytype'];
		

		foreach($userTypes as $usertyp)
		{
			if($usertyp == 'DON')
			{
				$mydatadon = $this->userdonorseachdata($usertyp,$input);
				$json = json_encode($mydatadon);
				$donor = json_decode($mydatadon);
			}
			if($usertyp == 'IND' || $usertyp == 'LIB' || $usertyp == 'ORG' )
			{
				$mydatauser = $this->userseachdata($usertyp,$input);
				$json = json_encode($mydatauser);
				$users = json_decode($mydatauser);
			}
			
			if($usertyp == 'LIBGROUP')
			{
				$mydatalibraryg = $this->userlibrarygroupdata($usertyp,$input);
				$json = json_encode($mydatalibraryg);
				$libraryg = json_decode($mydatalibraryg);
			}
			
		}
			$mydata = array_merge($donor, $users,$libraryg);
			
			if(!empty($mydata))
			{
				$data = $mydata;
			}
			if(empty($data))
			{
				$data = '';
			}
			//dd(DB::getQueryLog());
			//echo '<pre>';print_r($data);exit; 
		if ($request->ajax()) {
				return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('roles', function($row) {
                         $s_btn = '';
                       if(!empty($row->rolename)){
                           foreach($row->rolename as $v) {
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
							$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/'.$controller.'/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
							}
							if(!empty($row->foundation_id))
							{
								$controller = 'foundation';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/'.$controller.'/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
							}
							if(!empty($row->libraryid))
							{
								$controller = 'librarygroup';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/'.$controller.'/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
							}
						
                           
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
       $roles = Role::all();
	  
       return view('admin.users.index',compact('roles'));
	}
	
	
	
	public function userseachdata($type,$data)
	{
		$query = User::orderBy('id', 'DESC');
		//print_r($data);exit;
			if(!empty($data['userRole']))
			{		   
				$query = User::role($data['userRole']);
			}
			
			if(!empty($data['searchtext']))
			{	
				if(!empty($data['emailcheck']))
				{
					$query = $query->where('email',$data['searchtext']);
				}
				else
				{
					$query = $query->where('name','LIKE','%'.$data['searchtext'].'%');
				}
				
				if(!empty($data['statususer']))
				{
					$query = $query->where('status',$data['statususer']);
				}	
			}
				
			if(!empty($data['createdFrom']) || !empty($data['createdTo']))
				{
					$query = $query->whereBetween('created_at', array(date("Y-m-d", strtotime($data['createdFrom'])), date("Y-m-d", strtotime($data['createdTo']))));
				}
				
			if(!empty($data['modifiesFrom']) || !empty($data['modifiesTo']))
				{
					$query = $query->whereBetween('updated_at', array(date("Y-m-d", strtotime($data['modifiesFrom'])), date("Y-m-d", strtotime($data['modifiesTo']))));
				}
			
			if(!empty($type))
				{
					$query = $query->whereIn('user_type',$data['usertytype']);
				}

		//DB::enableQueryLog(); 
		 
		return $datas = $query->select(
						'id',                   
                        'name',
						'email',
                        'status',
						'user_type'
                    )->get();
		//dd(DB::getQueryLog());
		
		//print_r($datas);exit;	
	}
	
	public function userdonorseachdata($type,$data)
	{
		$query = Foundation::orderBy('id', 'DESC');
		$query = Foundation::leftjoin('gg_foundation_contact as gfc', 'gg_foundation.id', '=', 'gfc.foundation_id')
                    //->where('gg_module_fields.module_id', $id)
                   /*  ->where('gg_module_fields.field_name', 'Gender') */
                    ->select(
						'gg_foundation.id',                   
                        'gg_foundation.name',
						'gfc.email',
						'gfc.foundation_id',
                        'gg_foundation.status'
                    );
					
		if(!empty($data['searchtext']))
			{	
				if(!empty($data['emailcheck']))
				{
					$query = $query->where('email',$data['searchtext']);
				}
				else
				{
					$query = $query->where('name','LIKE','%'.$data['searchtext'].'%');
				}
			}
			
			if(!empty($data['statususer']))
				{
					$query = $query->where('status',$data['statususer']);
				}	
			/*  if(!empty($data['createdFrom']) || !empty($data['createdTo']))
				{
					$query = $query->whereBetween('created_at', array(date("Y-m-d", strtotime($data['createdFrom'])), date("Y-m-d", strtotime($data['createdTo']))));
				}
				
			if(!empty($data['modifiesFrom']) || !empty($data['modifiesTo']))
				{
					$query = $query->whereBetween('updated_at', array(date("Y-m-d", strtotime($data['modifiesFrom'])), date("Y-m-d", strtotime($data['modifiesTo']))));
				}  */
				
			if(!empty($data['languageid']))
				{
					$query = $query->where('language',$data['languageid']);
				} 

		return $query->get();
		
	}
	
	public function userlibrarygroupdata($type,$data)
	{
		$data = array();
		$query = Library::orderBy('id', 'DESC');
		
		$query = Library::leftjoin('library_contact as gfc', 'library_basic.id', '=', 'gfc.libraryid')
                    //->where('gg_module_fields.module_id', $id)
                   /*  ->where('gg_module_fields.field_name', 'Gender') */
                    ->select(
						'library_basic.id',                   
                        'library_basic.name',
						'gfc.email',
						'gfc.libraryid',
                        'library_basic.status'
                    )
					->where('type','2');
               if(!empty($data['createdFrom']) || !empty($data['createdTo']))
				{
					$query = $query->whereBetween('created_at', array(date("Y-m-d", strtotime($data['createdFrom'])), date("Y-m-d", strtotime($data['createdTo']))));
				}
				
				if(!empty($data['modifiesFrom']) || !empty($data['modifiesTo']))
				{
					$query = $query->whereBetween('updated_at', array(date("Y-m-d", strtotime($data['modifiesFrom'])), date("Y-m-d", strtotime($data['modifiesTo']))));
				} 
				if(!empty($data['searchtext']))
				{	
					if(!empty($data['emailcheck']))
					{
						$query = $query->where('email',$data['searchtext']);
					}
					else
					{
						$query = $query->where('name','LIKE','%'.$data['searchtext'].'%');
					}	
				}
				if(!empty($data['languageid']))
				{
					$query = $query->where('languageid',$data['languageid']);
				} 
				
				/* if(!empty($data['statususer']))
				{
					$query = $query->where('status',$data['statususer']);
				} */

		return $query->get();
		
		/* foreach($query as $libg)
		{	
			$tstatus ='Inactive';
			if($libg->status == '1')
			{
			$tstatus ='Active';
			}
			$data=array(
			'id'=> $libg['id'],
			'name'=> $libg['library'],
			'email'=> $libg['email'],
			'tstatus'=> $tstatus,
			);
		}
		return $data; */
		
	}
	
	
	public function listalluser(Request $request)
	{
		//print_r($request->all());exit;
		$filter = "";
		$role= "";
		$firstletter ="";
		if(!empty($request))
		{
			$filter = $request->filter;
			$firstletter = $request->firstletter;
			if($filter == 'role')
			{
				$role = $request->role;
			}
		}
		
		//print_r($data);exit;
		if ($request->ajax()) {
			$data = $this->getuserlistdatabyfilter($filter,$role,$firstletter);
				return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('roles', function($row) {
                         $s_btn = '';
                       if(!empty($row->rolename)){
                           foreach($row->rolename as $v) {
                            $s_btn = '<label class="badge badge-success">'. $v .'</label>';
                            } 
                        } 
                      return  $s_btn;
                    })
                   ->escapeColumns([])
                     ->addColumn('checkbox', function($row){
   
                          $btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="'.$row->id.'">';
                                   
                            return $btn;
                    })
                    ->rawColumns(['checkbox']) 
                    ->make(true);
        }

		$roles = Role::all();
		return view('admin.users.listalluser',compact('roles','filter','role','data'));
	}
	
	
	public function getuserlistdatabyfilter($filter,$role,$firstletter)
	{
		$query = User::orderBy('id', 'DESC');
		if(!empty($filter))
		{
			if($filter == 'role')
			{
				$query = User::role($role);
			}
			if($filter == 'inactive')
			{
				$query = User::where('status','0');
			}
			
			if($filter == 'banned')
			{
				$query = User::where('status','2');
			}
			
			if($filter == 'deleted')
			{
				$query = User::where('status','3');
			}
			
			if(!empty($firstletter))
			{
				$query = $query->where('name', 'LIKE', $firstletter.'%');
			}
			
		}else{
			if(!empty($firstletter))
			{
				$query = $query->where('name', 'LIKE', $firstletter.'%');
			}
		}
		
		//DB::enableQueryLog();
		 return $query->where('user_type','=',null)->get();
		//dd(DB::getQueryLog());
	}
	
	public function updateaction(Request $request)
	{
		$data = array(
		'status'=>$request->val
		);
		$queryRun = DB::table('users')->whereIn('id', $request->favorite)->update($data);
		if($queryRun)
		{
			return 'yes';
		}else{
			return 'no';
		}
	}
	
}
