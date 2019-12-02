<?php

namespace App\Http\Controllers\Admin\Permission;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class PermissionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {
       
    	if ($request->ajax()) {
            $data = Permission::all();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/permission/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/permission/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

       return view('admin.permission.index');
    }

    public function create() {
       
        return view('admin.permission.create');
    }
    public function store() {
        try {

            $permission = Permission::create($this->validateRequest());

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Permission added")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        
        }

        return redirect('admin/permission')->with('message', $output);
        
    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.edit')->with(compact('permission'));
    }

    public function update(Request $request, $id) 
    {
        try {

                $input = $request->only(['name']);
                
                $permission = Permission::findOrFail($id);          
                $permission->name = $input['name'];
                $permission->save();

                $output = ['class' => 'alert-position-success',
                            'msg' => __("Permission updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
            }

            return redirect('admin/permission')->with('message', $output);
    }
    public function destroy($id)
    {

        try {
            
            $permission = Permission::findOrFail($id);
            $permission->delete();

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Permission Deleted")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
         return redirect('admin/permission')->with('message', $output);
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'guard_name' => 'required',
            ]);
    }
}
