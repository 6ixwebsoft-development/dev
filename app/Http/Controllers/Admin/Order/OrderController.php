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
						  if(!empty($row->value)){
							   $s_btn = '<label class="badge badge-success">'.$row->value .'</label>';
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
                    ->make(true);
        }

       return view('admin.order.index');
    } 
	
	 public function create() {
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
        return view('admin.order.create',compact('subscriptionstatus','product','payment'));
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

            $subscription = Order::insert($data);
			DB::commit();
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Order created")
                            ];
			return redirect('admin/order')->with('message', $output);
            } catch (\Exception $e) {
				DB::rollBack();
				echo $e;
				$output	= ['class' => 'alert-position-danger',
					'msg' => __("Order Not create")
					];
				//return redirect('admin/order')->with('message', $output);
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
	
}
