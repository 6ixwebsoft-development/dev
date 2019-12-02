<?php

namespace App\Http\Controllers\Admin\Subscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class SubscriptionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request) {

    	if ($request->ajax()) {

            $data = Subscription::all();
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
                        
                           $btn = '<a href="'.url('admin').'/subscription/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/subscription/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

       return view('admin.subscription.index');
    }

    public function create() {
       
        return view('admin.subscription.create');
    }
    public function store(request $request) {
        try {
            
            $subscription = Subscription::create($request->all());

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Subscription added")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        
        }

        return redirect('admin/subscription')->with('message', $output);
        
    }
    public function edit($id)
    {
        $subscription = Subscription::find($id);
        return view('admin.subscription.edit')->with(compact('subscription'));
    }

    public function update(Request $request, $id) 
    {
        try {
                $input = $request->only(['name', 'start_date', 'end_date', 'status', 'price', 'no_of_days']);
                if(!isset($input['status'])) {
                    $input['status'] = 0;
                }
                
                $subscription = Subscription::findOrFail($id);          
                $subscription->name = $input['name'];
                $subscription->start_date = $input['start_date'];
                $subscription->end_date = $input['end_date'];
                $subscription->status = $input['status'];
                $subscription->price = $input['price'];
                $subscription->no_of_days = $input['no_of_days'];
                $subscription->save();

                $output = ['class' => 'alert-position-success',
                            'msg' => __("Subscription updated")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
            }

            return redirect('admin/subscription')->with('message', $output);
    }
    public function destroy($id)
    {

        try {
            
            $subscription = Subscription::findOrFail($id);
            $subscription->delete();

            $output = ['class' => 'alert-position-success',
                            'msg' => __("Subscription Deleted")
                            ];
            } catch (\Exception $e) {
            
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
         return redirect('admin/subscription')->with('message', $output);
    }

    private function validateRequest() {
        return request()->validate([
          //  'name' => 'required|min:3',
          //  'guard_name' => 'required',
            ]);
    }
}
