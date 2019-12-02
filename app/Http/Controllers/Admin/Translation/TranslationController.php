<?php

namespace App\Http\Controllers\Admin\Translation;
use App\Models\Translation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class TranslationController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {

    	if ($request->ajax()) {
            $data = Translation::all();
            
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="'.url('admin').'/translation/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/translation/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

       return view('admin.translation.index');
    }

    public function create() {
       
        return view('admin.translation.create');
    }
    public function store() {
      
        try {
        
            $translation = Translation::create($this->validateRequest());

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Translation group added")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        
        }

        return redirect('admin/translation')->with('message', $output);
        
    }
    public function edit($id)
    {
        $translation = Translation::find($id);
        return view('admin.translation.edit')->with(compact('translation'));
    }

    public function update(Request $request, $id) 
    {
        try {
                $input = $request->only(['group']);
                
                $translation = Translation::findOrFail($id);
                               
                $translation->group = $input['group'];
                $translation->save();

                $output = ['class' => 'alert-position-success',
                            'msg' => __("Translation updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
            }

            return redirect('admin/translation')->with('message', $output);
    }
    public function destroy($id)
    {

        try {
            
            $translation = Translation::findOrFail($id);
            $translation->delete();

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Translation Deleted")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
         return redirect('admin/translation')->with('message', $output);
    }

    private function validateRequest() {
        return request()->validate([
            'group' => 'required|min:3',
            ]);
    }
}
