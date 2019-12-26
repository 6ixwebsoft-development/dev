<?php

namespace App\Http\Controllers\Admin\Hitlist;

use App\Models\Hitlist;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;


class HitlistController extends Controller
{
    public function index(Request $request) 
	{
		if ($request->ajax())
			{
				$data = Hitlist::all();
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
					$btn  = '<a href="'.url('admin').'/hitlist/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
					<a onclick="return confirm('.$txt.')" href="'.url('admin').'/hitlist/delete/'.$row->id.'" class="delete btn btn-danger btn-sm"   >Delete</a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
			}

		return view('admin.hitlist.index');
	}
	
	public function create()
	{
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		return view('admin.hitlist.create')->with(compact('language'));
	}
	
	public function store(Request $request)
	{
		//print_r($request->all());exit;
		
		$this->validate($request, [
            'name' => 'required',
			'keyword' => 'required',
			'lenguage' => 'required',
        ]);
		
		$data = array(
			"name" => $request->name,
			"keyword"  => $request->keyword,
			"lenguage"  => $request->lenguage,
			"description"  => $request->description,
			"created_at"  => now(),
		);

		$Hitlist = Hitlist::insert($data);
		if($Hitlist){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Hitlist created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Hitlist Not create")
                            ];
		}

		return redirect('admin/hitlist')->with('message', $output);
	}
	
	public function edit($id)
	{
		$hitlist = Hitlist::find($id);
		$language = Language::where('status','1')->pluck('language', 'id')->all();
		return view('admin.hitlist.edit')->with(compact('hitlist','language'));
	}
	
	public function update(Request $request, $id) 
    {
		$this->validate($request, [
            'name' => 'required',
			'keyword' => 'required',
			'lenguage' => 'required',
        ]);
		
		
		$product = Hitlist::find($id);
		
		$product->name = $request->input('name');
		$product->keyword = $request->input('keyword');
		$product->lenguage = $request->input('lenguage');
		$product->description = $request->input('description');
		$product->updated_at = now();
		
		$product->save();
		if($product){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Hitlist updated")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Product Not update")
                            ];
		}

		return redirect('admin/hitlist')->with('message', $output);
	}
	
	
	
	public function delete($id) { 
        try{
			
		$Hitlist = Hitlist::findOrFail($id);
		$Hitlist->delete();
        $output = ['class' => 'alert-position-success',
                        'msg' => __("Hitlist deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
        return back()->with('message', $output);
    }
	
}
