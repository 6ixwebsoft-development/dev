<?php

namespace App\Http\Controllers\Admin\Modules;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class ModuleController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {

    	if ($request->ajax()) {

            $data = Modules::all();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/modules/module/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/modules/module/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.modules.module.index');
    }

    public function create() {
        return view('admin.modules.module.create');
    }

    public function store(Request $request)
    {
	    try {
            
            $input = $request->only(['name', 'status']);

            $modules = Modules::create($input);

            $output = ['success' => true,
                            'data' => $modules,
                            'msg' => __("Module added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return redirect('admin/modules/module')->with('status', $output);

    }

    public function edit($id)
    {
        $module = Modules::find($id);
        
        return view('admin.modules.module.edit')->with(compact('module'));
    }

    public function update(Request $request, $id) 
    {
        try {
                $input = $request->only(['name', 'status']);
                
                $module = Modules::findOrFail($id);
                
                $module->name = $input['name'];
                $module->status = $input['status'];
                $module->save();

                $output = ['success' => true,
                            'msg' => __("Module updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return redirect('admin/modules/module')->with('status', $output);
    }

    public function destroy($id)
    {
        try {
            
            $module = Modules::findOrFail($id);
            $module->delete();

            $output = ['success' => true,
                        'msg' => __("Module Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/modules/module')->with('status', $output);
    }
}
