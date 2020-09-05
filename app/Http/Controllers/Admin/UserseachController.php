<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Foundation;

use App\Models\Library;
use App\Models\LibraryContact;
use App\Models\Libraryips;
use App\Models\Librarylogin;
use App\Models\Libraryremoteip;


use App\Models\Individual;
use App\Models\IndividualContact;
use App\Models\IndividualPersonal;
use App\Models\IndividualPerpose;
use App\Models\IndividualStudy;
use App\Models\IndividualCare;
use App\Models\IndividualWalfare;
use App\Models\IndividualResearch;
use App\Models\IndividualProject;
use App\Models\IndividualChildern;
use App\Models\IndividualVideo;
use App\Models\IndividualLibrary;
use App\Models\Documents;
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
		
		//print_r($input);exit;
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
				$data = array();
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
							if($controller = 'organization' || $controller = 'individual')
							{
								if($row->user_type == 'LIB' || $row->user_type == 'IND' ||$row->user_type == 'ORG')
								{
									$btn = '<a href="'.url('admin').'/order/create/'.$row->id.'/'.$row->user_type.'" class="edit btn btn-warning btn-sm">Order</a>
									<a href="'.url('admin').'/subscription/create/'.$row->id.'/'.$row->user_type.'" class="edit btn btn-info btn-sm">Subscribe</a>';
								}
								
								if($row->status == '1')
								{
									$btn .='<a href="" onClick="getalllistcheckboxval(0,'.$row->id.');" class="edit btn btn-danger btn-sm">Inactivate</a>';
								}else{
									$btn .='<a href="" onClick="getalllistcheckboxval(1,'.$row->id.');" class="edit btn btn-success btn-sm">Activate</a>';
								}
								
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
								$btn = '<a href="'.url('admin').'/subscription/create/'.$row->id.'/LIBGRP" class="edit btn btn-info btn-sm">Subscribe</a>';
								
								if($row->status == '1')
								{
									$btn .='<a href="" onClick="getLibGrpStatus(0,'.$row->id.');" class="edit btn btn-danger btn-sm">Inactivate</a>';
								}else{
									$btn .='<a href="" onClick="getLibGrpStatus(1,'.$row->id.');" class="edit btn btn-success btn-sm">Activate</a>';
								}
								
								
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
					->escapeColumns([])
					->addColumn('created_at', function($row){
							
							if(!empty($row->created_at))
							{
								 $datefor = date('F d Y,', strtotime($row->created_at))
;
								$btn = '<span class="">'.$datefor.'</span>';
							}else{
								$btn = '----';
							}
                            return $btn;
                    })
                    ->rawColumns(['created_at']) 
					->escapeColumns([])
					->addColumn('updated_at', function($row){
							
							if(!empty($row->updated_at))
							{
								 $datefor = date('F d Y,', strtotime($row->updated_at))
;
								$btn = '<span class="">'.$datefor.'</span>';
							}else{
								$btn = '----';
							}
                            return $btn;
                    })
                    ->rawColumns(['updated_at']) 
					->escapeColumns([])
					->addColumn('user_type', function($row){
							
							if($row->user_type == 'IND')
							{
								$type = "Individual";
							}else if($row->user_type == 'LIB'){
								$type = "Library";
							}else if($row->user_type == 'ORG'){
								$type = "Organization";
							}else if($row->user_type == 'FND'){
								$type = "Foundation";
							}else if($row->user_type == 'LIBGRP'){
								$type = "Library Group";
							}else{
								$type = "";
							}
                            return $btn = '<span class="">'.$type.'</span>';
                    })
                    ->rawColumns(['user_type']) 
					->escapeColumns([])
					->addColumn('mobile', function($row){
							
							if($row->user_type == 'IND')
							{
								$mobile = IndividualContact::get_mobile($row->id);
							}else if($row->user_type == 'LIB'){
								$mobile = LibraryContact::get_mobile($row->id);
							}else if($row->user_type == 'ORG'){
								$mobile = LibraryContact::get_mobile($row->id);
							}else if($row->user_type == 'FND'){
								$mobile = FoundationContact::get_mobile($row->id);
							}else if($row->user_type == 'LIBGRP'){
								$mobile = LibraryContact::get_mobile($row->id);
							}else{
								$mobile = "";
							}
                            return $btn = '<span class="">'.$mobile.'</span>';
                    })
                    ->rawColumns(['mobile']) 
					 ->escapeColumns([])
					 ->addColumn('email', function($row){
							$btn ='';
							if(!empty($row->user_type)){
							$controller = '';
							if($row->user_type == 'LIB'){$controller = 'library';}
							if($row->user_type == 'ORG'){$controller = 'organization';}
							if($row->user_type == 'IND'){$controller = 'individual';}
							$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
							}
							if(!empty($row->foundation_id))
							{
								$controller = 'foundation';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
							}
							if(!empty($row->libraryid))
							{
								$controller = 'librarygroup';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
							}
						
                            return $btn;
                    })
                    ->rawColumns(['email'])
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
					$query = $query->where('name','LIKE','%'.$data['searchtext'].'%')->orwhere('id',$data['searchtext'])->orwhere('email',$data['searchtext']);
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
				
			if($data['statususer'] == '1' ||$data['statususer'] == '0')
				{
					$query = $query->where('status',$data['statususer']);
				}

		//DB::enableQueryLog(); 
		 
		return $datas = $query->select(
						'id',                   
                        'name',
						'email',
                        'status',
						'user_type',
						'created_at',
						'updated_at'
                    )->where('status','!=','3')->get();
		//dd(DB::getQueryLog());
		
		//print_r($datas);exit;	
	}
	
	public function userdonorseachdata($type,$data)
	{
		$query = Foundation::orderBy('id', 'DESC');
		$query = Foundation::leftjoin('gg_foundation_contact as gfc', 'gg_foundation.id', '=', 'gfc.foundation_id')
                    ->select(
						'gg_foundation.id',                   
                        'gg_foundation.name',
						'gg_foundation.user_type',
						'gfc.email',
						'gfc.foundation_id',
						'gg_foundation.created_at',  
						'gg_foundation.updated_at',  
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
					$query = $query->where('gg_foundation.name','LIKE','%'.$data['searchtext'].'%')->orwhere('gfc.foundation_id',$data['searchtext'])->orwhere('gfc.email',$data['searchtext']);
				}
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
			
			if($data['statususer'] == '1' ||$data['statususer'] == '0')
				{
					if($data['statususer'] == 1)
					{
						$status = "Active";
					}
					if($data['statususer'] == 0)
					{
						$status = "Expired";
					}
					$query = $query->where('status',$status);
				}
			
		//	DB::enableQueryLog();
		$found_data = $query->where('deleted','0')->get();
		//dd(DB::getQueryLog());
		//print_r($found_data);exit;
		return $found_data;
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
						'library_basic.user_type',
						'library_basic.created_at',						
						'library_basic.updated_at',
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
						
						$query = $query->where('library_basic.name','LIKE','%'.$data['searchtext'].'%')->orwhere('library_basic.id',$data['searchtext'])->orwhere('gfc.email',$data['searchtext']);
					}	
				}
				if(!empty($data['languageid']))
				{
					$query = $query->where('languageid',$data['languageid']);
				} 
				
			 if(!empty($data['statususer']))
				{
					$query = $query->where('status',$data['statususer']);
				} 
				
				

		return $query->where('status','!=','3')->get();
		
		
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
					->escapeColumns([])
					 ->addColumn('name', function($row){							$btn ='';							if(!empty($row->user_type)){							$controller = '';							if($row->user_type == 'LIB'){$controller = 'library';}							if($row->user_type == 'ORG'){$controller = 'organization';}							if($row->user_type == 'IND'){$controller = 'individual';}
					if($row->user_type == 'STAFF'){$controller = 'users';}
					 if($row->status == 3)							{								$dlt_usr = 'DELETE_'.$row->id.'@globalgrant.com';								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$dlt_usr.'</a>';															}else{								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';							} 							}							if(!empty($row->foundation_id))							{								$controller = 'foundation';								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';							}							if(!empty($row->libraryid))							{								$controller = 'librarygroup';								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->name.'</a>';							}						                            return $btn;                    })                    ->rawColumns(['name'])                    
                    ->rawColumns(['name']) 
					
					
					
                    ->addColumn('status', function($row){
							
							if($row->status == 1)
							{
								$btn = '<span class="badge badge-success">Active</span>';
							}else if($row->status == 0){
								$btn = '<span class="badge badge-danger">Inactive</span>';
							}
							else if($row->status == 2){
								$btn = '<span class="">Banned</span>';
							}else{
								$btn = '<span class="badge badge-danger">Delete</span>';
							}   
                            return $btn;
                    })
                    ->rawColumns(['status']) 
					->addColumn('last_login_at', function($row){
							
							if(!empty($row->last_login_at))
							{
								 $datefor = date('F d Y, h:i A', strtotime($row->last_login_at))
;
								$btn = '<span class="">'.$datefor.'</span>';
							}else{
								$btn = '----';
							}
                            return $btn;
                    })
                    ->rawColumns(['last_login_at']) 
					->escapeColumns([])
					 ->addColumn('email', function($row){
							$btn ='';
							if(!empty($row->user_type)){
							$controller = '';
							if($row->user_type == 'LIB'){$controller = 'library';}
							if($row->user_type == 'ORG'){$controller = 'organization';}
							if($row->user_type == 'IND'){$controller = 'individual';}
							if($row->user_type == 'STAFF'){$controller = 'users';}
							if($row->status == 3)
							{
								$mail=  'DELETE_'.$row->id.'@globalgrant.com';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$mail.'</a>';
								
							}else{
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
							}   
							
							}
							if(!empty($row->foundation_id))
							{
								
								$controller = 'foundation';
								if($row->status == 3)
								{
								$mail=  'DELETE_'.$row->id.'@globalgrant.com';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$mail.'</a>';
								
								}else{
									$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
								}
								
							}
							if(!empty($row->libraryid))
							{
								
								$controller = 'librarygroup';
								if($row->status == 3)
								{
								$mail=  'DELETE_'.$row->id.'@globalgrant.com';
								$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$mail.'</a>';
								
								}else{
									$btn = '<a href="'.url('admin').'/'.$controller.'/'.$row->id.'/edit" class="">'.$row->email.'</a>';
								}
								
							}
						
                            return $btn;
                    })
                    ->rawColumns(['email'])
                    ->make(true);
        }

		$roles = Role::all();
		return view('admin.users.listalluser',compact('roles','filter','role'));
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
		if(empty($filter) && empty($firstletter)){
			$query = User::where('status','!=','3');
		}
		//DB::enableQueryLog();
		 return $query->where('user_type','!=','ADMIN')->where('id', "!=", Auth()->user()->id)->get();
		//dd(DB::getQueryLog());
	}
	
	public function updateaction(Request $request)
	{


		$data = array(
		'status'=>$request->val
		);
		if($request->id != '')
		{
			if($request->val == '3')
			{
				$queryRun = $this->check_user($id);
			}else{
				$queryRun = DB::table('users')->where('id', $request->id)->update($data);

			}
			
		}else{
			if($request->val == '3')
			{
				// print_r($request->favorite);
				// die();
				$queryRun = $this->check_user($request->favorite);				
			}else{
				$queryRun = DB::table('users')->whereIn('id', $request->favorite)->update($data);
			}			
		}
		
		if($queryRun)
		{
			return 'yes';
		}else{
			return 'no';
		}
	}
	
	
	public function check_user($id='')
	{

		$chech_user_type = DB::table('users')->where('id', $id)->first();
		
		if($chech_user_type->user_type == 'LIB'  || $chech_user_type->user_type == 'ORG')
		{
			foreach($id as $uid)
			{
				$basic = Library::where('userid',$uid)->first();
				$data = array(
				'name'=> 'DELETE_'.$uid.'@globalgarnt.com',
				'status'=>3,
				'email'=>'DELETE_'.$uid.'@globalgarnt.com'
				);				
				Documents::delete_data($uid);
				Library::delete_data($uid);
				LibraryContact::delete_data($uid);
				Libraryips::delete_data($basic->id);
				Librarylogin::delete_data($basic->id);				
				Libraryremoteip::delete_data($basic->id);
				$queryRun =DB::table('users')->where('id', $uid)->update($data);
				
			}
			if($queryRun)
			{
				return true;
			}else{
				return false;
			}
		}
		if($chech_user_type->user_type == 'IND')
		{
			foreach($id as $uid)
			{
				$data = array(
				'name'=> 'DELETE_'.$uid.'@globalgarnt.com',
				'status'=>3,
				'email'=>'DELETE_'.$uid.'@globalgarnt.com'
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
			}
			if($queryRun)
			{
				return true;
			}else{
				return false;
			}
		}
		if($chech_user_type->user_type == 'STAFF')
		{
			foreach($id as $uid)
			{
				$data = array(
				'name'=> 'DELETE_'.$uid.'@globalgarnt.com',
				'status'=>3,
				'email'=>'DELETE_'.$uid.'@globalgarnt.com'
				);
				$queryRun = DB::table('users')->where('id', $uid)->update($data);
			}
			if($queryRun)
			{
				return true;
			}else{
				return false;
			}
		}
	}
	
}
