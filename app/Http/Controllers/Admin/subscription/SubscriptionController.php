<?php

namespace App\Http\Controllers\Admin\Subscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Models\Payment;

use App\Models\Transaction;
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

            $data = Subscription::orderBy('id', 'DESC')
					->leftjoin('subscriptiontype as srdt', 'gg_subscription.subscriptiontype_id', '=', 'srdt.id')
					->leftjoin('gg_module_fields_values as gmf', 'gg_subscription.paymentstatus', '=', 'gmf.id')
					->select(
						'gg_subscription.id', 
						'gg_subscription.userid',
						'gg_subscription.name',
						'gg_subscription.start_date',
						'gg_subscription.end_date',
						'gg_subscription.price',
						'gg_subscription.no_of_days',
						'srdt.eng_name',
						'gg_subscription.paymentstatus',
						'gmf.value'
                    )->where('gg_subscription.status','!=','3')->get();
				return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('paiddate', function($row) {
                        
                            $s_btn = '';                     
                        return  $s_btn;
                    })
                    ->escapeColumns([])
					 ->addIndexColumn()
                    ->editColumn('status', function($row) {
                        
                          $s_btn = '';  
						  $color = '';
						  if(!empty($row->value)){
							  if($row->paymentstatus == 16 ||$row->paymentstatus == 123 )
							  {
								 $color = 'success';
							  }
							  if($row->paymentstatus == 15 ||$row->paymentstatus == 128 )
							  {
								 $color = 'warning';
							  }
							  if($row->paymentstatus == 17 ||$row->paymentstatus == 124 )
							  {
								 $color = 'dark';
							  }
						  
						  
							   $s_btn = '<label class="badge badge-'.$color.'">'.$row->value .'</label>';
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
					->escapeColumns([])
					->addColumn('checkbox', function($row){

						$btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="'.$row->id.'">';

						return $btn;
						})
					->rawColumns(['checkbox']) 
					->make(true);
        }
		$subscriptionstatusr = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subscription Status')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
					
        $subscriptionstatus = array();
        foreach ($subscriptionstatusr as $subscriptionstatusVal) {
            $subscriptionstatus[$subscriptionstatusVal->id] = $subscriptionstatusVal->value;
			
        } 
       return view('admin.subscription.index',compact('subscriptionstatus'));
    }

    public function create($id='',$type='') {
		
		 $userdata =array();
		 $substypedata =array();
        $subscriptionstatusr = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subscription Status')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
					
        $subscriptionstatus = array();
        foreach ($subscriptionstatusr as $subscriptionstatusVal) {
            $subscriptionstatus[$subscriptionstatusVal->id] = $subscriptionstatusVal->value;
			
        } 

		$payment = Payment::pluck('paymentmethod','id')->all();
		if(!empty($id) || !empty($type))
		{
			$userdata = User::where('id',$id)->where('user_type',$type)->first();
			$substypedata = Subscriptiontype::where('usertype',$type)->get();
		}

        return view('admin.subscription.create',compact('subscriptionstatus','payment','userdata','substypedata'));
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
					"subscriptiontype_id"  => $result['subscId'],
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

            $subscription = Subscription::insertGetId($data);
		//	$insertedId = $subscription->id;
			$freighttax = $result['newfr']*$result['newfrt']/100;
			$vat = $result['newprice']*$result['newvat']/100;
			$totaltax = $vat;
			 $transdata = array(
					"customerid" => $result['cid'],
					"orderid" => $subscription,
					"customername" =>$result['name'],
					"productid" => $result['subscId'],
					"paymentmood" => $result['paymentmood'],
					"status" => $result['paymentstatus'],
					"address" => null,
					"selesperson" => null,
					"total" => $result['newprice'],
					"vat" => $vat,
					"misc" => $result['newmisc'],
					"freight" => $result['newfr'],
					"freighttax" => $freighttax,
					"totaltax" =>$totaltax ,
					"totalinvoice" => $result['newtotal'],
					"user_type"  => $result['type'],
					"order_type"  => 'SUB',
					"orderdate" => date("Y-m-d"),
					"created_at" =>now(),
					
			);
			 $transaction = Transaction::insert($transdata);
			
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
		  $subscriptionstatusr = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Subscription Status')
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
					
        $subscriptionstatus = array();
        foreach ($subscriptionstatusr as $subscriptionstatusVal) {
            $subscriptionstatus[$subscriptionstatusVal->id] = $subscriptionstatusVal->value;
			
        } 
		$payment = Payment::pluck('paymentmethod','id')->all();
        $subscription = Subscription::find($id);
		$substypedata = Subscriptiontype::where('id',$subscription->subscriptiontype_id)->get();
		
		
        return view('admin.subscription.edit')->with(compact('subscription','subscriptionstatus','payment','substypedata'));
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
					"subscriptiontype_id"  => $result['subscId'],
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
			$freighttax = $result['newfr']*$result['newfrt']/100;
			$vat = $result['newprice']*$result['newvat']/100;
			$totaltax = $vat;
			 $transdata = array(
					"customerid" => $result['cid'],
					"customername" =>$result['name'],
					"productid" => $result['subscId'],
					"paymentmood" => $result['paymentmood'],
					"status" => $result['paymentstatus'],
					"address" => null,
					"selesperson" => null,
					"total" => $result['newprice'],
					"vat" => $vat,
					"misc" => $result['newmisc'],
					"freight" => $result['newfr'],
					"freighttax" => $freighttax,
					"totaltax" =>$totaltax ,
					"totalinvoice" => $result['total'],
					"orderdate" => date("Y-m-d"),
					"created_at" =>now(),
					
			);
			DB::table('gg_transaction')->where('orderid', $id)->update($transdata);
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
	
	public function getsubsbystatus(Request $request)
	{       
		if ($request->ajax()) {

            $data = Subscription::orderBy('id', 'DESC')
					->leftjoin('subscriptiontype as srdt', 'gg_subscription.subscriptiontype_id', '=', 'srdt.id')
					->leftjoin('gg_module_fields_values as gmf', 'gg_subscription.paymentstatus', '=', 'gmf.id')
					->select(
						'gg_subscription.id', 
						'gg_subscription.userid',
						'gg_subscription.name',
						'gg_subscription.start_date',
						'gg_subscription.end_date',
						'gg_subscription.price',
						'gg_subscription.no_of_days',
						'srdt.eng_name',
						'gg_subscription.paymentstatus',
						'gmf.value'
                    )->where('paymentstatus',$request->cid)->where('gg_subscription.status','!=','3')->get();
				return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('paiddate', function($row) {
                        
                            $s_btn = '';                     
                        return  $s_btn;
                    })
                    ->escapeColumns([])
					 ->addIndexColumn()
                    ->editColumn('status', function($row) {
                        
                          $s_btn = '';  
						  $color = '';
						  if(!empty($row->value)){
							  if($row->paymentstatus == 16 ||$row->paymentstatus == 123 )
							  {
								 $color = 'success';
							  }
							  if($row->paymentstatus == 15 ||$row->paymentstatus == 128 )
							  {
								 $color = 'warning';
							  }
							  if($row->paymentstatus == 17 ||$row->paymentstatus == 124 )
							  {
								 $color = 'dark';
							  }
							   $s_btn = '<label class="badge badge-'.$color.'">'.$row->value .'</label>';
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
                    ->escapeColumns([])
					->addColumn('checkbox', function($row){

						$btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="'.$row->id.'">';

						return $btn;
						})
					->rawColumns(['checkbox']) 
					->make(true);
        }
	}
	
	public function changestatus(Request $request)
	{
		
		
		if($request->txt == 'sts')
		{
			$data = array(
			'status'=>$request->val
			);
		}else{
			$data = array(
				'paymentstatus'=>$request->val
				);
		}
		$queryRun = DB::table('gg_subscription')->whereIn('id', $request->favorite)->update($data);
		
		if($queryRun)
		{
			 $output = ['class' => 'alert-position-success',
				'msg' => __("Subscription Deleted")
				];
			return 'yes';
		}else{
			 $output = ['class' => 'alert-position-danger',
				'msg' => __("Subscription not Deleted")
				];
			return 'no';
		}
	}
	
}

							
							
						