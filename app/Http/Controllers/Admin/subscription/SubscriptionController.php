<?php

namespace App\Http\Controllers\Admin\Subscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Models\Subscriptiontype;
use DataTables;
use DB;
use Hash;

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
		 $this->validate($request, [
					'name' => 'required',
					'cid' => 'required',
					'type' => 'required',
					'start_date' => 'required',
					'end_date' => 'required',
					/* 'paymenttype' => 'required',
					'paymentstatus' => 'required', */
				]); 
				DB::beginTransaction();
        try {
             $result = $request->all();
			 $diff = '';
			 $sdate = '';
			 $edate = '';
			if(!empty($result['start_date']) && !empty($result['end_date'])){
				 $sdate = date("Y-m-d", strtotime($result['start_date']));
				 $edate = date("Y-m-d", strtotime($result['end_date']));
				 $date1 = strtotime($result['start_date']); 
				 $date2 = strtotime($result['end_date']);  
				 $diff = abs($date2 - $date1)/60/60/24;
				}
			 $data = array(
					"name" => $result['name'],
					"userid"  => $result['cid'],
					"user_type"  => $result['type'],
					"subscriptionid"  => $result['subscriptionid'],
					"start_date"  => $sdate,
					"end_date"  => $edate,
					"status"  => 1,
					"paymenttype"  => $result['paymentmood'],
					"paymentstatus"  => $result['paymentstatus'], 
					"price"  => $result['newprice'],
					"misc"  => $result['newmisc'],
					"vat"  => $result['newvat'],
					"freight"  => $result['newfr'],
					"freighttax"  => $result['newfrt'],
					"total"  => $result['newtotal'],
					"no_of_days"  => $diff,
					"subsnote"  => $result['subscriptionnote'],				
					"created_at"  =>now(),
			);

            $subscription = Subscription::insert($data);
			DB::commit();
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Subscription created")
                            ];
			return redirect('admin/subscription')->with('message', $output);
            } catch (\Exception $e) {
				DB::rollBack();
				//echo $e;
				$output	= ['class' => 'alert-position-danger',
					'msg' => __("Subscription Not create")
					];
				return redirect('admin/subscription')->with('message', $output);
        }

        
        
    }
    public function edit($id)
    {
        $subscription = Subscription::find($id);
        return view('admin.subscription.edit')->with(compact('subscription'));
    }

    public function update(Request $request, $id) 
    {
		$this->validate($request, [
					'name' => 'required',
					'cid' => 'required',
					'type' => 'required',
					'start_date' => 'required',
					'end_date' => 'required',
					/* 'paymenttype' => 'required',
					'paymentstatus' => 'required', */
				]); 
				DB::beginTransaction();
        try {
               $result = $request->all();
			 $diff = '';
			 $sdate = '';
			 $edate = '';
			if(!empty($result['start_date']) && !empty($result['end_date'])){
				 $sdate = date("Y-m-d", strtotime($result['start_date']));
				 $edate = date("Y-m-d", strtotime($result['end_date']));
				 $date1 = strtotime($result['start_date']); 
				 $date2 = strtotime($result['end_date']);  
				 $diff = abs($date2 - $date1)/60/60/24;
				}
			 $data = array(
					"name" => $result['name'],
					"userid"  => $result['cid'],
					"user_type"  => $result['type'],
					"subscriptionid"  => $result['subscriptionid'],
					"start_date"  => $sdate,
					"end_date"  => $edate,
					"status"  => 1,
					"paymenttype"  => $result['paymentmood'],
					"paymentstatus"  => $result['paymentstatus'], 
					"price"  => $result['newprice'],
					"misc"  => $result['newmisc'],
					"vat"  => $result['newvat'],
					"freight"  => $result['newfr'],
					"freighttax"  => $result['newfrt'],
					"total"  => $result['total'],
					"no_of_days"  => $diff,
					"subsnote"  => $result['subscriptionnote'],				
					"updated_at"  =>now(),
			);
			DB::table('gg_subscription')->where('id', $id)->update($data);
             DB::commit();
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Subscription updated")
                            ];
			return redirect('admin/subscription')->with('message', $output);
            } catch (\Exception $e) {
				DB::rollBack();
				//echo $e;
               $output	= ['class' => 'alert-position-danger',
					'msg' => __("Subscription Not updated")
					];
				return redirect('admin/subscription')->with('message', $output);
            }

            
    }
    public function delete($id)
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
	
	public function userlist(Request $request)
	{ 
	
		 if ($request->ajax()) {
			
           $data = User::whereIn('user_type',['IND','LIB','ORG'])->get();
			
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('roles', function($row) {
                         $s_btn = '';
                        if(!empty($row->getRoleNames())){
                           foreach($row->getRoleNames() as $v) {
                            $s_btn = '<label class="badge badge-success">'. $v .'</label>';
                            } 
                        }
                            
                      return  $s_btn;
                    })
                   ->escapeColumns([])
                    ->addColumn('action', function($row){
   
                          $btn = '<a class="btn btn-primary btn-sm btnSelect"><i class="fa fa-arrow-right"></i></a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
	}
	
	public function getsubscriptiontype(Request $request)
	{
		$data = Subscriptiontype::where('usertype',$request->col4)->get();
		$Html = '';
		foreach($data as $mydata){
		$Html .= '<div class="col-md-7"><input type="radio" name="subscription_type"  id="'.$mydata->id.'" value="'.$mydata->id.'" onChage="putsubscriptiondata()"><span class="sunstitle">'.$mydata->eng_name.'<span><br><span class="sunstitle">'.$mydata->eng_desc.'<span></div><div class="col-md-5"><div class="form-group row"><div class="col-md-2"><label >Price</label></div><div class="col-md-4"><input class="form-control" type="text" name="price" id="price_'.$mydata->id.'" value="'.$mydata->price.'"></div><div class="col-md-2"><label >+Misc</label></div><div class="col-md-4"><input class="form-control" type="text" name="misc" id="misc_'.$mydata->id.'" value="'.$mydata->misc.'"></div></div><div class="form-group row"><div class="col-md-6"></div><div class="col-md-2"><label >VAT</label></div><div class="col-md-4"><input class="form-control" type="text" name="vat" id="vat_'.$mydata->id.'" value="'.$mydata->vat.'"></div></div><div class="form-group row"><div class="col-md-6"></div><div class="col-md-2"><label >Freight %</label></div><div class="col-md-4"><input class="form-control" type="text" name="freight" id="freight_'.$mydata->id.'" value="'.$mydata->frieghtcharge.'"></div></div><div class="form-group row"><div class="col-md-4"></div><div class="col-md-4"><label >Freight Tax %</label></div><div class="col-md-4"><input class="form-control" type="text" name="freighttax" id="freighttax_'.$mydata->id.'" value="'.$mydata->frieghttax.'"></div></div></div>';
		}
		echo $Html;exit;
	}
	
}

							
							
						