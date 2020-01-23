<?php

namespace App\Http\Controllers\Admin\Office;
use App\Models\Offices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;

class OfficeController extends Controller
{
	public function index(Request $request) 
	{
		if ($request->ajax())
			{
				$data = Offices::all();
				return Datatables::of($data)
				->addIndexColumn()
				->editColumn('status', function($row) {
				if($row->status == 1) {
				$s_btn = '<span class="badge badge-success">Active</span>';
				}else {
				$s_btn = '<span class="badge badge-danger">Inactive</span>';
				}
				return  $s_btn;
				})
				
				->escapeColumns([])
				->addColumn('action', function($row){
					
					$txt = "'Are you sure to delete this?'";
					$btn  = '<a href="'.url('admin').'/Office/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
					<a onclick="return confirm('.$txt.')" href="'.url('admin').'/Office/delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
			}

		return view('admin.offices.index');
	}
	
	public function create()
	{
		return view('admin.offices.create');
	}
	
	public function store(Request $request)
	{
		//print_r($request->all());exit;
		 $this->validate($request, [
			'country' => 'required',
			'countrycode' => 'required',
			'office' => 'required',
			'tag' => 'required',
			'address1' => 'required',
			'phonenumber' => 'required',
			'city' => 'required',
			'email' => 'required',
        ]);
		
		
		if(empty($request->input('status')))
		{$status = 0;}else{$status = 1;}
		
		$data = array(
			"country" => $request->country,
			"countrycode"  => $request->countrycode,
			"city"  => $request->city,
			"office"  => $request->office,
			"tag"   =>  $request->tag,
			"phonenumber"  => $request->phonenumber,
			"faxnumber" => $request->faxnumber,
			"tinnumber"  =>$request->tinnumber,
			"bankaccount"  => $request->bankaccount,
			"bankcode"  => $request->bankcode,
			"address1"   =>  $request->address1,
			"address2"   =>  $request->address2,
			"address3"   =>  $request->address3,
			"address4"   =>  $request->address4,
			"address5"   =>  $request->address5,
			"email"   => $request->email,
			"googlemap"   => $request->googlemap,
			"urladdress"   => $request->urladdress,
			"status"  => $status,
			"created_at"  => now(),
		);

		$Offices = Offices::insert($data);
		if($Offices){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Office created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Office Not create")
                            ];
		}

		return redirect('admin/Office')->with('message', $output);
	}
	
	public function edit($id)
	{
		$Offices = Offices::find($id);
		return view('admin.offices.edit')->with(compact('Offices'));
	}
	
	public function update(Request $request, $id) 
    {
		$this->validate($request, [
            'country' => 'required',
			'countrycode' => 'required',
			'office' => 'required',
			'tag' => 'required',
			'address1' => 'required',
			'phonenumber' => 'required',
			'city' => 'required',
			'email' => 'required',
        ]);
		
		if(empty($request->input('status')))
		{$status = 0;}else{$status = 1;}
		
		$Offices = Offices::find($id);
		
		$Offices->country = $request->input('country');
		$Offices->countrycode = $request->input('countrycode');
		$Offices->city = $request->input('city');
		$Offices->office = $request->input('office');
		$Offices->tag = $request->input('tag');
		$Offices->phonenumber = $request->input('phonenumber');
		$Offices->faxnumber = $request->input('faxnumber');
		$Offices->tinnumber = $request->input('tinnumber');
		$Offices->bankaccount = $request->input('bankaccount');
		$Offices->bankcode = $request->input('bankcode');
		$Offices->address1 = $request->input('address1');
		$Offices->address2 = $request->input('address2');
		$Offices->address3 = $request->input('address3');
		$Offices->address4 = $request->input('address4');
		$Offices->address5 = $request->input('address5');
		$Offices->email = $request->input('email');
		$Offices->googlemap = $request->input('googlemap');
		$Offices->urladdress = $request->input('urladdress');
		$Offices->status = $status;
		$Offices->updated_at = now();
		
		$Offices->save();
		if($Offices){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Office updated")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Office Not update")
                            ];
		}

		return redirect('admin/Office')->with('message', $output);
	}
	
	public function delete($id) { 
        try{
			
		$Payment = Offices::findOrFail($id);
		$Payment->delete();
        $output = ['class' => 'alert-position-success',
                        'msg' => __("Payment deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
        return back()->with('message', $output);
    }
	
}
