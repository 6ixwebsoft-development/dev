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
	
	public function userseachdata($type,$data)
	{
		$query = User::orderBy('id');
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
					$query = $query->whereBetween('created_at', array($data['createdFrom'], $data['createdTo']));
				}
				
			if(!empty($data['modifiesFrom']) || !empty($data['modifiesTo']))
				{
					$query = $query->whereBetween('updated_at', array($data['modifiesFrom'], $data['modifiesTo']));
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
                        'status'
                    )->get();
		//dd(DB::getQueryLog());
		
		//print_r($datas);exit;	
	}
	
	public function userdonorseachdata($type,$data)
	{
		$query = Foundation::orderBy('id');
		$query = Foundation::leftjoin('gg_foundation_contact as gfc', 'gg_foundation.id', '=', 'gfc.foundation_id')
                    //->where('gg_module_fields.module_id', $id)
                   /*  ->where('gg_module_fields.field_name', 'Gender') */
                    ->select(
						'gg_foundation.id',                   
                        'gg_foundation.name',
						'gfc.email',
                        'gg_foundation.status'
                    )
                    ->get();
		
		return $query;
		
	}
	
	public function userlibrarygroupdata($type,$data)
	{
		$data = array();
		$query = Library::orderBy('id');
		
		$query = Library::leftjoin('library_contact as gfc', 'library_basic.id', '=', 'gfc.libraryid')
                    //->where('gg_module_fields.module_id', $id)
                   /*  ->where('gg_module_fields.field_name', 'Gender') */
                    ->select(
						'library_basic.id',                   
                        'library_basic.name',
						'gfc.email',
                        'library_basic.status'
                    )
					->where('type','2')
                    ->get();
					
			return $query;
		
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
	
}
