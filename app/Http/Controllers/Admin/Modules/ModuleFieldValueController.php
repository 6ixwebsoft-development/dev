<?php

namespace App\Http\Controllers\Admin\Modules;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class ModuleFieldValueController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {

        if ($request->ajax()) {

            $data = ModuleFieldValue::leftjoin('gg_module_fields AS mdf', 'gg_module_fields_values.field_id', '=', 'mdf.id')
                                ->select(
                                        'gg_module_fields_values.id',
                                        'mdf.field_name as field_name',
                                        'language_id as language',
                                        'value',
                                        'gg_module_fields_values.status as status'
                                    )
                                ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/modules/fieldvalue/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/modules/fieldvalue/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.modules.fieldvalue.index');
    }

    public function create() {
        $moduleFields = ModuleField::select('id', 'field_name')->get();

        $module_field_arr = array();
        foreach ($moduleFields as $moduleField) {
            $module_field_arr[$moduleField->id] = $moduleField->field_name;
        }
        return view('admin.modules.fieldvalue.create')->with('moduleFields', $module_field_arr);
    }

    public function store(Request $request)
    {
        try {
            
            $input = $request->only(['field_id', 'language_id', 'value', 'status']);
            
            $ModuleFieldValue = ModuleFieldValue::create($input);

            $output = ['success' => true,
                            'data' => $ModuleFieldValue,
                            'msg' => __("Module Field value added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/modules/fieldvalue')->with('status', $output);

    }

    public function edit($id)
    {
        $moduleFieldValue = ModuleFieldValue::find($id);
        $modulesFields = ModuleField::select('id', 'field_name')->get();

        $module_field_arr = array();
        foreach ($modulesFields as $moduleField) {
            $module_field_arr[$moduleField->id] = $moduleField->field_name;
        }
        /*echo "<pre>";
        print_r($moduleField);
        die("asdgasdgasd");*/
        
        return view('admin.modules.fieldvalue.edit')->with(compact('moduleFieldValue', 'module_field_arr'));
    }

    public function update(Request $request, $id) 
    {
        try {
                $input = $request->only(['field_id', 'language_id', 'value', 'status']);
                
                $modulFieldValue = ModuleFieldValue::findOrFail($id);
                
                $modulFieldValue->field_id = $input['field_id'];
                $modulFieldValue->language_id = $input['language_id'];
                $modulFieldValue->value = $input['value'];
                $modulFieldValue->status = $input['status'];
                $modulFieldValue->save();

                $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
            }

            return redirect('admin/modules/fieldvalue')->with('status', $output);
    }

    public function destroy($id)
    {
        try {
            
            $moduleFieldValue = ModuleFieldValue::findOrFail($id);
            $moduleFieldValue->delete();

            $output = ['success' => true,
                        'msg' => __("Module Field Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/modules/fieldvalue')->with('status', $output);
    }
}
