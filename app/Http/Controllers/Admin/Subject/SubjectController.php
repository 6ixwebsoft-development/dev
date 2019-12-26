<?php

namespace App\Http\Controllers\Admin\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use DataTables;
use DB;


class SubjectController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $data = Subject::all();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                          $btn = '<a href="'.url('admin').'/subject/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/subject/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
       return view('admin.subject.index');
    }
    public function create()
    {
        return view('admin.subject.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);


        $role = Subject::create(['name' => $request->input('name')]);
		
		$output = ['success' => false,
                            'msg' => __("Subject created successfully")
                        ];
        return redirect('admin/subject')
                        ->with('status',$output);
        
    }

    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('admin.subject.edit',compact('subject','permission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $subject = Subject::find($id);
        $subject->name = $request->input('name');
        $subject->save();
		
		$output = ['success' => false,
                            'msg' => __("Subject updated successfully")
                        ];
        return redirect('admin/subject')
                        ->with('status',$output);
    }
    public function delete($id)
    {
        DB::table("gg_subject")->where('id',$id)->delete();
       $output = ['success' => false,
                            'msg' => __("Subject deleted successfully")
                        ];
        return redirect('admin/subject')
                        ->with('status',$output);
    }
}
