<?php

namespace App\Http\Controllers\Admin\Subscriptiontype;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscriptiontype;
use DataTables;
use DB;

class SubscriptiontypeController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Subscriptiontype::get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/subscriptiontype/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a onclick="return confirm('.$txt.')" href="'.url('admin').'/subscriptiontype/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.subscriptionttype.index');
    }
	
	public function create()
    {
        return view('admin.subscriptionttype.create');
    }
	
	public function store(Request $request)
    {
		$result = $request->all();
		/* print_r($result);exit; */
		
		$this->validate($request, [
            'usertype' => 'required',
			'duration' => 'required',
			'price' => 'required|numeric',
			'misc' => 'required|numeric',
			'vat' => 'required|numeric',
			'freightcharge' => 'required|numeric',
			'freighttax' => 'required|numeric',
			'eng_name' => 'required',
			'sv_name' => 'required',
        ]);
		
		if(!empty($result['display'])){
			$display = $result['display'];
		}else{
			$display = null;
		}
		$data = array(
		"usertype"  => $result['usertype'],
		"duration"  => $result['duration'],
		"price"  => $result['price'],
		"currency"  => $result['currency'],
		"display"  => $result['display'],
		"misc"  => $result['misc'],
		"vat"  => $result['vat'],
		"frieghtcharge"  => $result['freightcharge'],
		"frieghttax"  => $result['freighttax'],
		"totalprice"  => $result['totalprice'],
		"eng_name"  => $result['eng_name'],
		"eng_desc"  => $result['eng_desc'],
		"sven_name"  => $result['sv_name'],
		"sven_desc"  => $result['sv_desc'],
		"created_at"  => now(),
		);
		
		$subs = Subscriptiontype::insert($data);
		if($subs){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Subscriptiontype created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Subscriptiontype Not create")
                            ];
		}

		return redirect('admin/subscriptiontype')->with('message', $output);
    }
	
	public function edit($id)
	{
		$subsc = Subscriptiontype::find($id);
		return view('admin.subscriptionttype.edit')->with(compact('subsc'));
	}
	
	public function update(Request $request ,$id)
	{
	  $result = $request->all();
	
		$this->validate($request, [
            'usertype' => 'required',
			'duration' => 'required',
			'price' => 'required|numeric',
			'misc' => 'required|numeric',
			'vat' => 'required|numeric',
			'freightcharge' => 'required|numeric',
			'freighttax' => 'required|numeric',
			'eng_name' => 'required',
			'sv_name' => 'required',
        ]);
		if(!empty($result['display'])){
			$display = $result['display'];
		}else{
			$display = null;
		}
		
		$data = array(
		"usertype"  => $result['usertype'],
		"duration"  => $result['duration'],
		"price"  => $result['price'],
		"currency"  => $result['currency'],
		"display"  => $result['display'],
		"misc"  => $result['misc'],
		"vat"  => $result['vat'],
		"frieghtcharge"  => $result['freightcharge'],
		"frieghttax"  => $result['freighttax'],
		"totalprice"  => $result['totalprice'],
		"eng_name"  => $result['eng_name'],
		"eng_desc"  => $result['eng_desc'],
		"sven_name"  => $result['sv_name'],
		"sven_desc"  => $result['sv_desc'],
		"created_at"  => now(),
		);
		
		$subs = DB::table('subscriptiontype')->where('id', $id)->update($data);
		
		if($subs){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Subscriptiontype created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Subscriptiontype Not create")
                            ];
		}

		return redirect('admin/subscriptiontype')->with('message', $output);
		
	}
	
	public function delete($id)
	{
		try {			

		Subscriptiontype::where('id', $id)->delete();
			
		$output	= ['class' => 'alert-position-success',
                            'msg' => __("Subscriptiontype created")
                            ];
		} catch (\Exception $e) {
		
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Subscriptiontype Not deleted")
                            ];
		}

		return redirect('admin/subscriptiontype')->with('message', $output);
	}
	
}
