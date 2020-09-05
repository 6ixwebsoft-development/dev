<?php

namespace App\Http\Controllers\Admin\Location;

use App\Models\CountryBlock;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CountryBlockController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {
        if ($request->ajax()) {

            $data = CountryBlock::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   							$txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/location/countryblock/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm('.$txt.')"  href="'.url('admin').'/location/countryblock/delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.location.countryblock.index');
    }

    public function create(Request $request) {

        
        return view('admin.location.countryblock.create');
    }

    public function store(Request $request)
    {
        try {
            
            $input = $request->only(['name']);

            if(empty($request->All()['status'])){
                $input['status'] = 0;
            }else{
                $input['status'] = $request->All()['status'];
            }

            $countryblock = CountryBlock::create($input);
            
            $output = ['success' => true,
                            'msg' => __("Country Block added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/location/countryblock')->with('status', $output);

    }

    public function edit($id)
    {
        $countryBlock = CountryBlock::find($id);
        return view('admin.location.countryblock.edit')->with(compact('countryBlock'));
    }

    public function update(Request $request, $id) 
    {
        try {

            $input = $request->only(['name']);

            if(empty($request->All()['status'])){
                $input['status'] = 0;
            }else{
                $input['status'] = $request->All()['status'];
            }
            
            $countryBlock = CountryBlock::findOrFail($id);
            
            $countryBlock->name = $input['name'];
            $countryBlock->status = $input['status'];
            $countryBlock->save();

            $output = ['success' => true,
                            'msg' => __("Country Block updated")
                            ];
        } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("something went wrong")
                        ];
        }

        return redirect('admin/location/countryblock')->with('status', $output);
    }

    public function delete($id)
    {
        try {
            $countryBlock = CountryBlock::findOrFail($id);
            $countryBlock->delete();

            $output = ['success' => true,
                        'msg' => __("Country Block Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("something went wrong")
                    ];
        }

        return redirect('admin/location/countryblock')->with('status', $output);
    }
}
