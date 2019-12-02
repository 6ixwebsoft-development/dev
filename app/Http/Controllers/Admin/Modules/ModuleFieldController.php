<?php

namespace App\Http\Controllers\Admin\Modules;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class ModuleFieldController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {

        if ($request->ajax()) {

            $data = ModuleField::leftjoin('gg_modules AS md', 'gg_module_fields.module_id', '=', 'md.id')
                                ->select(
                                        'gg_module_fields.id',
                                        'md.name as module_name',
                                        'field_name',
                                        'field_type',
                                        'gg_module_fields.status as status'
                                    )
                                ->get();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/modules/field/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/modules/field/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.modules.field.index');
    }

    public function create(Request $request) {
        $modules = Modules::select('id', 'name')->get();

        $module_arr = array();
        foreach ($modules as $module) {
            $module_arr[$module->id] = $module->name;
        }
        return view('admin.modules.field.create')->with('modules', $module_arr);
    }

    public function store(Request $request)
    {
        try {
            
            $input = $request->only(['module_id', 'field_name', 'field_type', 'status']);

            $moduleField = ModuleField::create($input);

            $output = ['success' => true,
                            'data' => $moduleField,
                            'msg' => __("Module Field added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return redirect('admin/modules/field')->with('status', $output);

    }

    public function edit($id)
    {
        $moduleField = ModuleField::find($id);
        $modules = Modules::select('id', 'name')->get();

        $module_arr = array();
        foreach ($modules as $module) {
            $module_arr[$module->id] = $module->name;
        }
        /*echo "<pre>";
        print_r($moduleField);
        die("asdgasdgasd");*/
        
        return view('admin.modules.field.edit')->with(compact('moduleField', 'module_arr'));
    }

    public function update(Request $request, $id) 
    {
        try {
                $input = $request->only(['module_id', 'field_name', 'field_type', 'status']);
                
                $modulField = ModuleField::findOrFail($id);
                
                $modulField->module_id = $input['module_id'];
                $modulField->field_name = $input['field_name'];
                $modulField->field_type = $input['field_type'];
                $modulField->status = $input['status'];
                $modulField->save();

                $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return redirect('admin/modules/field')->with('status', $output);
    }

    public function destroy($id)
    {
        try {
            
            $moduleField = ModuleField::findOrFail($id);
            $moduleField->delete();

            $output = ['success' => true,
                        'msg' => __("Module Field Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/modules/field')->with('status', $output);
    }
}
