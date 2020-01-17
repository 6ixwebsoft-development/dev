<?php

namespace App\Http\Controllers\Admin\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Models\Sproduct;
use App\User;
use App\Models\Payment;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use Hash;
class OrderController extends Controller
{
   public function index(Request $request) {

    	if ($request->ajax()) {

            $data = Order::orderBy('id', 'DESC')
					->leftjoin('sproduct as srdt', 'gg_order.productid', '=', 'srdt.id')
					->leftjoin('gg_module_fields_values as gmf', 'gg_order.orderstatus', '=', 'gmf.id')
					->select(
						'gg_order.id', 
						'gg_order.userid',
						'gg_order.orderdate', 
						'gg_order.name',
						'gg_order.totalprice',
						'gg_order.ordernotes',
						'gg_order.totalprice',
						'gg_order.created_at',
						'srdt.productname',
						'gg_order.orderstatus',
						'gmf.value'
                    )->get();
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
							  if($row->orderstatus == 12 ||$row->orderstatus == 121  )
							  {
								 $color = 'success';
							  }
							  if($row->orderstatus == 10)
							  {
								 $color = 'warning';
							  }
							  if($row->orderstatus == 14)
							  {
								 $color = 'dark';
							  }
							  if($row->orderstatus == 13)
							  {
								 $color = 'light';
							  }
							  if($row->orderstatus == 11)
							  {
								 $color = 'primary';
							  }
						  
							   $s_btn = '<label class="badge badge-'.$color.'">'.$row->value .'</label>';
						  }
							return  $s_btn; 
                        return  $s_btn;
                    })
                    ->escapeColumns([])
                    ->addColumn('action', function($row){
                        
                           $btn = '<a href="'.url('admin').'/order/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/order/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
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
                    ->where('gg_module_fields.field_name', 'Order Status')
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

       return view('admin.order.index',compact('subscriptionstatus'));
    } 
	
	 public function create($id='',$type='') {
		 $userdata =array();
        $subscriptionstatusr = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Order Status')
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
		$product= Sproduct::all();
		$payment = Payment::pluck('paymentmethod','id')->all();
		
		if(!empty($id) || !empty($type))
		{
			$userdata = User::where('id',$id)->where('user_type',$type)->first();
			//print_r($userdata);exit;
		}
		
        return view('admin.order.create',compact('subscriptionstatus','product','payment','userdata'));
    }
	
	 public function store(request $request) {
		$this->validate($request, [
					'name' => 'required',
					'cid' => 'required',
					'email' => 'required',
					'paymentstatus' => 'required', 
					]);  
				DB::beginTransaction();
        try {
             $result = $request->all();
			 $odate = '';
			if(!empty($result['order_date'])){
				 $odate = date("Y-m-d", strtotime($result['order_date']));
				}
			 $data = array(
					"name" => $result['name'],
					"userid"  => $result['cid'],
					"email"  => $result['email'],
					"orderid"  => $result['orderid'],
					"user_type"  => $result['usertype'],
					"productid"  => $result['productId'],
					"orderdate"  => $odate,
					"quantity"  => $result['newquantity'],
					"status"  => 1,
					"paymentmood"  => $result['paymentmood'],
					"orderstatus"  => $result['paymentstatus'], 
					"price"  => $result['newprice'],
					"misc"  => $result['newmisc'],
					"vat"  => $result['newvat'],
					"freightcost"  => $result['newfr'],
					"freighttax"  => $result['newfrt'],
					"totalprice"  => $result['newtotal'],
					"ordernotes"  => $result['ordernote'],				
					"created_at"  =>now(),
			);

            $subscription = Order::insertGetId($data);
			
			$freighttax = $result['newfr']*$result['newfrt']/100;
			$vat = $result['newprice']*$result['newvat']/100;
			$totaltax = $vat;
			 $transdata = array(
					"customerid" => $result['cid'],
					"orderid" => $subscription,
					"customername" =>$result['name'],
					"productid" => $result['productId'],
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
					"user_type"  => $result['usertype'],
					"order_type"  => 'ORD',
					"orderdate" => date("Y-m-d"),
					"created_at" =>now(),
					
			);
			 $transaction = Transaction::insert($transdata);
			DB::commit();
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Order created")
                            ];
			return redirect('admin/order')->with('message', $output);
            } catch (\Exception $e) {
				DB::rollBack();
				//echo $e;
				$output	= ['class' => 'alert-position-danger',
					'msg' => __("Order Not create")
					];
			return redirect('admin/order')->with('message', $output);
        }

        
        
    }
	
	public function edit($id)
    {
		 $subscriptionstatusr = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->where('gg_module_fields.field_name', 'Order Status')
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
		
		$product= Sproduct::all();
		$orderdata= Order::find($id);
		/* echo "<pre>";
		print_r($order);exit; */
		$payment = Payment::pluck('paymentmethod','id')->all();
        return view('admin.order.edit',compact('subscriptionstatus','product','orderdata','payment'));
		
	}
	
	public function update(Request $request, $id)
    {
		$this->validate($request, [
					'name' => 'required',
					'cid' => 'required',
					'email' => 'required',
					'paymentstatus' => 'required', 
					]);  
				DB::beginTransaction();
        try {
             $result = $request->all();
			 //print_r($result);exit;
			 
			 $odate = '';
			if(!empty($result['order_date'])){
				 $odate = date("Y-m-d", strtotime($result['order_date']));
				}
			 $data = array(
					"name" => $result['name'],
					"userid"  => $result['cid'],
					"email"  => $result['email'],
					"orderid"  => $result['orderid'],
					"user_type"  => $result['usertype'],
					"productid"  => $result['productId'],
					"orderdate"  => $odate,
					"quantity"  => $result['newquantity'],
					"status"  => 1,
					"paymentmood"  => $result['paymentmood'],
					"orderstatus"  => $result['paymentstatus'], 
					"price"  => $result['newprice'],
					"misc"  => $result['newmisc'],
					"vat"  => $result['newvat'],
					"freightcost"  => $result['newfr'],
					"freighttax"  => $result['newfrt'],
					"totalprice"  => $result['newtotal'],
					"ordernotes"  => $result['ordernote'],				
					"updated_at"  =>now(),
			);
		
          DB::table('gg_order')->where('id', $id)->update($data);
		 
		  $freighttax = $result['newfr']*$result['newfrt']/100;
			$vat = $result['newprice']*$result['newvat']/100;
			$totaltax = $vat;
			 $transdata = array(
					"customerid" => $result['cid'],
					"customername" =>$result['name'],
					"productid" => $result['orderid'],
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
					"orderdate" => date("Y-m-d"),
					"created_at" =>now(),
					
			);
			
			/* DB::enableQueryLog(); */
			DB::table('gg_transaction')->where('orderid', $id)->where('order_type','ORD')->update($transdata);
			 /* dd(DB::getQueryLog()); */
			DB::commit();
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Order updated")
                            ];
			return redirect('admin/order')->with('message', $output);
            } catch (\Exception $e) {
				DB::rollBack();
				//echo $e;
				$output	= ['class' => 'alert-position-danger',
					'msg' => __("Order Not updated")
					];
				return redirect('admin/order')->with('message', $output);
        }
	}
	
	 public function delete($id)
    {
        Order::find($id)->delete();
        $output	= ['class' => 'alert-position-success',
                            'msg' => __("Order Delete")
                            ];
		return redirect('admin/order')->with('message', $output);
    }
	
	public function getproduct(Request $request)
	{
		$id = $request->id;
		return $product= Sproduct::where('id',$id)->get();
	}
	
	public function getorderbystatus(Request $request)
	{
		if ($request->ajax()) {

            $data = Order::orderBy('id', 'DESC')
					->leftjoin('sproduct as srdt', 'gg_order.productid', '=', 'srdt.id')
					->leftjoin('gg_module_fields_values as gmf', 'gg_order.orderstatus', '=', 'gmf.id')
					->select(
						'gg_order.id', 
						'gg_order.userid',
						'gg_order.orderdate', 
						'gg_order.name',
						'gg_order.totalprice',
						'gg_order.ordernotes',
						'gg_order.totalprice',
						'gg_order.created_at',
						'srdt.productname',
						'gg_order.orderstatus',
						'gmf.value'
                    )->where('orderstatus',$request->cid)->get();
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
							  if($row->orderstatus == 12 ||$row->orderstatus == 121  )
							  {
								 $color = 'success';
							  }
							  if($row->orderstatus == 10)
							  {
								 $color = 'warning';
							  }
							  if($row->orderstatus == 14)
							  {
								 $color = 'dark';
							  }
							  if($row->orderstatus == 13)
							  {
								 $color = 'light';
							  }
							  if($row->orderstatus == 11)
							  {
								 $color = 'primary';
							  }
						  
							   $s_btn = '<label class="badge badge-'.$color.'">'.$row->value .'</label>';
						  }
							return  $s_btn; 
                    })
                    ->escapeColumns([])
                    ->addColumn('action', function($row){
                        
                           $btn = '<a href="'.url('admin').'/order/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                   <a href="'.url('admin').'/order/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
     
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
				'orderstatus'=>$request->val
				);
		}
		
		$queryRun = DB::table('gg_order')->whereIn('id', $request->favorite)->update($data);
		
		
		if($queryRun)
		{
			 $output = ['class' => 'alert-position-success',
				'msg' => __("Order Deleted")
				];
			return 'yes';
		}else{
			 $output = ['class' => 'alert-position-danger',
				'msg' => __("Order not Deleted")
				];
			return 'no';
		}
	}
	
}
