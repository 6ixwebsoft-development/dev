<?php

namespace App\Http\Controllers\Admin\Language;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;


class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       /* $this->middleware(function ($request, $next) {
            return $next($request);
        });*/ 
    }
    
           
      
   
    public function index(Request $request) {

    	if ($request->ajax()) {
         
            $data = Language::all();
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
   
                          $btn  = '<a href="'.url('admin').'/language/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/language/forcedelete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       return view('admin.language.index');
    }

    public function create() {
       
        return view('admin.language.create');
    }
    public function store() {
         
        try {
            print_r($this->validateRequest());
           
            $language = Language::create($this->validateRequest());

            $output = ['class' => 'alert-position-success',
                            'msg' => __("language added")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }

        return redirect('admin/language')->with('message', $output);
        
    }
    public function edit($id)
    {
        $language = Language::find($id);
    
        return view('admin.language.edit')->with(compact('language'));
    }

    public function update(Request $request, $id) 
    {
         
        try {
                $input = $request->only(['language', 'locale', 'status']);
                if(!isset($input['status'])) {
                    $input['status'] = 0;
                }
                $language = Language::findOrFail($id);
                $language->language = $input['language'];
                $language->locale = $input['locale'];
                $language->status = $input['status'];
                $language->save();

                $output = ['class' => 'alert-position-success',
                            'msg' => __("language updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
            }

           return redirect('admin/language')->with('message', $output);
    }
     public function destroy($id)
    {
        try{
            $language = Language::findOrFail($id);
            $language->delete();
            $output = ['class' => 'alert-position-success',
                        'msg' => __("Temporary deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }

        return redirect('admin/language/deleted')->with('message', $output);
    }
    public function restore($id) {
        try{
        Language::withTrashed()->find($id)->restore();
        $output = ['class' => 'alert-position-success',
                    'msg' => __("Language restored")
                    ];
        } catch (\Exception $e) {
            $output = ['class' => 'alert-position-danger',
                        'msg' => __("something went wrong!")
                    ];
        }
        return back()->with('message', $output);
    }
	
    public function deleted(Request $request) { 
        if ($request->ajax()) {
            $data = DB::table('gg_languages')->whereNotNull('deleted_at')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                          $btn = '<a href="'.url('admin').'/language/restore/'.$row->id.'" class="edit btn btn-primary btn-sm">Restore</a>
                                   <a href="'.url('admin').'/language/forcedelete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       
        return view('admin.language.deleted');
    }
    public function forceDelete($id) { 
        try{
        $language = Language::withTrashed()->findOrFail($id);
        $language->forceDelete();
        $output = ['class' => 'alert-position-success',
                        'msg' => __("Language permanent deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
        return back()->with('message', $output);
    }
    private function validateRequest() {
        
        return request()->validate([
            'language' => 'required|min:3',
            'locale' => 'required',
            'status' => '',
            ]);
    }
}
