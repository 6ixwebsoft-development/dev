<?php

namespace App\Http\Controllers\Admin\Purpose;

use App\Models\Purpose;
use App\Models\Sproduct;
use App\Models\Form;

use App\Models\Hitlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;


class PurposeController extends Controller
{
    public function index(Request $request) 
	{
		/* $data = Purpose::find(6)->formdata;
		echo "<pre>";
		//$products = Purpose()->get();
		print_r($data);exit; */
		if ($request->ajax())
			{
				$data = Purpose::all();
				return Datatables::of($data)
				->addIndexColumn()
				->editColumn('formid', function($row) {
					$s_btn = '';
					if($row->formid) {
					$dataform = json_decode($row->formid,true);					
					if(!empty($dataform))
					{
						foreach($dataform as $form)
						{
							 //if($form[0]){$s_btn .= '';}else{$s_btn .= ',';}
							 $s_btn .= $form.',';
						}
					}
				}
				return  $s_btn;
				})

				->addIndexColumn()
				->editColumn('hitlist', function($row) {
				if($row->id) {
					$datahit = Purpose::find($row->id)->formdata;
					$s_btn = '';
					if(!empty($datahit))
					{
						foreach($datahit as $hits)
						{
							 $s_btn .= '<a href="'.url('admin').'/hitlist/'.$hits->id.'/edit">'.$hits->name.'</a><br>';
						}
					}
					
				}
				
				return  $s_btn;
				})
				
				->escapeColumns([])
				->addColumn('action', function($row){
					$txt = "'Are you sure to delete this?'";
					$btn  = '<a href="'.url('admin').'/purpose/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
					<a onclick="return confirm('.$txt.')" href="'.url('admin').'/purpose/delete/'.$row->id.'" class="delete btn btn-danger btn-sm"   >Delete</a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
			}

		return view('admin.purpose.index');
	}
	
	public function create()
	{
		$product = Sproduct::all();
		$form = Form::pluck('name', 'id')->all();
		$hitlist = Hitlist::pluck('name', 'id')->all();
		$purpose = Purpose::pluck('purpose', 'id')->all();		
		return view('admin.purpose.create')->with(compact('form','hitlist','product','purpose'));
	}
	
	public function store(Request $request)
	{
		$this->validate($request, [
            'description1' => 'required',
			'description2' => 'required',
        ],[
        'description1.required' => 'The Home and Search Desc( English ) field is required.',
		'description2.required' => 'The Home and Search Desc( Svenska ) field is required.',
    ]);
		$FormIds = json_encode($request->formid); 
		$HitlistIds = json_encode($request->hitlist);
		$purposIds = json_encode($request->purposeid);
		//echo $request->purposeid[0];exit;
		if(!empty($request->purposeid))
		{
			$Purpose = Purpose::select('purpose')->where('id',$request->purposeid[0])->get();
			$purpose = $Purpose[0]->purpose;
		}else{
			$purpose = $request->showseaechdesc1;
		}

		$data = array(
			"purpose" => $purpose,
			"formid" => $FormIds,
			"hitlist"  => $HitlistIds,
			"autoproductid"  => $request->autoproductid,
			"coustomproductid"  => $request->coustomproductid,
			"purposeid"  => $purposIds,
			"description2"   =>  $request->description2,
			"showseaechdesc2"  => $request->showseaechdesc2,
			"memberdescription2" => $request->memberdescription2,
			"showmemberdesc2"  =>$request->showmemberdesc2,
			"description1"  => $request->description1,
			"showseaechdesc1"  => $request->showseaechdesc1,
			"memberdescription1"  => $request->memberdescription1,
			"showmemberdesc1"   =>  $request->showmemberdesc1,
			"created_at"  => now(),
		);

		$purpose = Purpose::insert($data);
		if($purpose){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Purpose created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Purpose Not create")
                            ];
		}

		return redirect('admin/purpose')->with('message', $output);
	}
	
	public function edit($id)
	{
		$purposeuser = Purpose::find($id);
		$purposeids = json_decode($purposeuser->purposeid, true);
		$formids = json_decode($purposeuser->formid, true);
		$hitlistids = json_decode($purposeuser->hitlist, true);
		$product = Sproduct::all();
		$form = Form::pluck('name', 'id')->all();
		$hitlist = Hitlist::pluck('name', 'id')->all();
		$purpose = Purpose::pluck('purpose', 'id')->all();		
		return view('admin.purpose.edit')->with(compact('form','hitlist','product','purpose','purposeuser','purposeids','formids','hitlistids'));
	}
	
	public function update(Request $request, $id) 
    {
		$this->validate($request, [
            'description1' => 'required',
			'description2' => 'required',
			],[
			'description1.required' => 'The Home and Search Desc( English ) field is required.',
			'description2.required' => 'The Home and Search Desc( Svenska ) field is required.',
			]);
		
		
		$FormIds = json_encode($request->formid); 
		$HitlistIds = json_encode($request->hitlist);
		$purposIds = json_encode($request->purposeid);
		
		$purpose = Purpose::find($id);
		
		$purpose->purpose = $request->purpose;
		$purpose->formid =  $FormIds;
		$purpose->hitlist = $HitlistIds;
		$purpose->autoproductid = $request->autoproductid;
		$purpose->coustomproductid = $request->coustomproductid;
		$purpose->purposeid	= $purposIds;
		$purpose->description2 = $request->description2;
		$purpose->showseaechdesc2 = $request->showseaechdesc2;
		$purpose->memberdescription2 =	$request->memberdescription2;	
		$purpose->showmemberdesc2 = $request->showmemberdesc2;
		$purpose->description1 = $request->description1;
		$purpose->showseaechdesc1 = $request->showseaechdesc1;
		$purpose->memberdescription1 = $request->memberdescription;
		$purpose->showmemberdesc1 = 	$request->showmemberdesc1;
		$purpose->updated_at = now();

		
		$purpose->save();
		if($purpose){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Purpose updated")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Purpose Not update")
                            ];
		}

		return redirect('admin/purpose')->with('message', $output);
	}
	
	
	public function delete($id) { 
        try{
			
		$Purpose = Purpose::findOrFail($id);
		$Purpose->delete();
        $output = ['class' => 'alert-position-success',
                        'msg' => __("Purpose deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("Purpose went wrong!")
                        ];
        }
        return back()->with('message', $output);
    }
	
	
	
}
