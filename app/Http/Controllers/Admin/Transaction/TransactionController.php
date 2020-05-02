<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Models\Subscription;
use App\Models\Order;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class TransactionController extends Controller
{
	public function index(Request $request) {
		$feilds = array('Order Status','Subscription Status');
		 $paymentstatus = ModuleField::leftjoin('gg_module_fields_values as mfv', 'gg_module_fields.id', '=', 'mfv.field_id')
                    //->where('gg_module_fields.module_id', $id)
                    ->whereIn('gg_module_fields.field_name', $feilds)
                    ->select(
                        'mfv.id',
                        'gg_module_fields.field_name',
                        'gg_module_fields.field_type',
                        'mfv.value'
                    )
                    ->get();
        $paymenttype = array();
        foreach ($paymentstatus as $purposeVal) {
            $paymenttype[$purposeVal->id] = $purposeVal->value;
        } 
		return view('admin.transaction.index',compact('paymenttype'));
	}
	
	public function searchtransactiondata(Request $request)
	{
		$input = $request->all();
		//print_r($input);exit;
		if(!empty($input['usertype']))
		{
		$userTypes = $input['usertype'];
		}
		$mydata = array();
		$subsc = array();
		$order = array();
		
		//print_r($userTypes);exit;
		if(!empty($userTypes))
		{
			foreach($userTypes as $usertyp)
			{
				if($usertyp == 'ORD')
				{
					$mydatadon = $this->ordersearch($input);
					$json = json_encode($mydatadon);
					$order = json_decode($json); 
				}
			    if($usertyp == 'SUB')
				{
					$mydatasub = $this->subscriptionseach($input,$usertyp);
					$json = json_encode($mydatasub);
					$subsc = json_decode($json);
					//print_r($subsc);exit;
				}
				
			}
		}else
		{
			$mydatadon = $this->ordersearch($input);
			$json = json_encode($mydatadon);
			$order = json_decode($json); 
			
			$mydatasub = $this->subscriptionseach($input);
			$json = json_encode($mydatasub);
			$subsc = json_decode($json);
			
		}
		
		if(empty($order) && empty($subsc))
		{
			$mydata = array();
		}else{
			$mydata = array_merge($order, $subsc);
		}
		if(!empty($mydata))
		{
			$data = $mydata;
		}
		if(empty($data))
		{
			$data = array();
		}
		
		if ($request->ajax()) {
			
            return Datatables::of($data)
					->addIndexColumn()
                    ->editColumn('sname', function($row) {
                        if(!empty($row->eng_name))
						{
							 $s_btn = $row->eng_name;
						}
						if(!empty($row->productname))
						{
							$s_btn = $row->productname;
						}
                       /*  $s_btn = ''; */                     
                        return  $s_btn;
                    })
                    ->escapeColumns([])
					->addIndexColumn()
                    ->editColumn('start_date', function($row) {
                        if(!empty($row->eng_name))
						{
							 $s_btn = $row->start_date;
						}
						if(!empty($row->productname))
						{
							$s_btn = '0000-00-00';
						}                   
                        return  $s_btn;
                    })
                    ->escapeColumns([])
					->addIndexColumn()
                    ->editColumn('end_date', function($row) {
                        if(!empty($row->eng_name))
						{
							 $s_btn = $row->end_date;
						}
						if(!empty($row->productname))
						{
							$s_btn = '0000-00-00';
						}                   
                        return  $s_btn;
                    })
                    ->escapeColumns([])
					
					->addIndexColumn()
                    ->editColumn('total', function($row) {
                        if(!empty($row->eng_name))
						{
							 $s_btn = $row->total;
						}
						if(!empty($row->productname))
						{
							$s_btn = $row->totalprice;
						}
                       /*  $s_btn = ''; */                     
                        return  $s_btn;
                    })
                    ->escapeColumns([])
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
							 if(!empty($row->eng_name))
								{
									  $btn = '<a href="'.url('admin').'/subscription/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
										/* <a href="'.url('admin').'/subscription/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>'; */
								}
								if(!empty($row->productname))
								{
									 $btn = '<a href="'.url('admin').'/order/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>';
											/* <a href="'.url('admin').'/order/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>'; */
								}
                          
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
	}
	
	public function subscriptionseach($data)
	{
		$query = Subscription::orderBy('id', 'DESC')
		        ->leftjoin('users as usr', 'gg_subscription.userid', '=', 'usr.id')
				->leftjoin('subscriptiontype as sty', 'gg_subscription.subscriptiontype_id', '=', 'sty.id')
				->leftjoin('gg_module_fields_values as gmf', 'gg_subscription.paymentstatus', '=', 'gmf.id');
		if(!empty($data['customertype']))
		{
			$query = $query->whereIn('user_type',$data['customertype']);
		}
		if(!empty($data['status']))
		{
			$query = $query->where('paymentstatus',$data['status']);
		}
		 if(!empty($data['startdate']) || !empty($data['expiry_date']))
			{
				$query = $query->where('gg_subscription.start_date','>=',date("Y-m-d 00:00:00", strtotime($data['startdate'])));
				$query = $query->where('gg_subscription.start_date','<=',date("Y-m-d 00:00:00", strtotime($data['expiry_date'])));
			}
		if(!empty($data['paid_date_from']) || !empty($data['paid_date_to']))
		{
			$query = $query->whereBetween('gg_subscription.start_date', array(date("Y-m-d", strtotime($data['paid_date_from'])), date("Y-m-d", strtotime($data['paid_date_to']))));
		} 
		
		if(!empty($data['optuser']))
		{
			$query = $query->where('status',$data['optuser']);
		}	
		if(!empty($data['search']))
		{
			if(!empty($data['filter_exact_match']))
			{
				$query = $query->where('gg_subscription.name',$data['search']);
			}else{
				$query = $query->where('gg_subscription.name','LIKE',$data['search'].'%');
			}
		}	
		
		
		 return $datas = $query->select(
						'gg_subscription.id', 
						'sty.eng_name',
						'gg_subscription.name', 
						'gg_subscription.user_type', 
						'usr.email',
						'gg_subscription.total',
						'gg_subscription.start_date',
						'gg_subscription.end_date',
						'gg_subscription.created_at',
						'gg_subscription.updated_at',
						'gmf.value'
                    )->get();
					
	}
	
	public function ordersearch($data)
	{
		 $query = Order::orderBy('id', 'DESC')
					->leftjoin('sproduct as srdt', 'gg_order.productid', '=', 'srdt.id')
					->leftjoin('gg_module_fields_values as gmf', 'gg_order.orderstatus', '=', 'gmf.id');
					
					if(!empty($data['customertype']))
					{
						$query = $query->whereIn('user_type',$data['customertype']);
					}
					if(!empty($data['status']))
					{
						$query = $query->where('orderstatus',$data['status']);
					}
					if(!empty($data['optuser']))
					{
						$query = $query->where('status',$data['optuser']);
					}
					if(!empty($data['search']))
					{
						if(!empty($data['filter_exact_match']))
						{
							$query = $query->where('gg_order.name',$data['search']);
						}else{
							$query = $query->where('gg_order.name','LIKE',$data['search'].'%');
						}			
					}	
					if(!empty($data['startdate']) || !empty($data['expiry_date']))
					{
						$query = $query->whereBetween('gg_order.created_at', array(date("Y-m-d 00:00:00", strtotime($data['startdate'])), date("Y-m-d 23:59:59", strtotime($data['expiry_date']))));
					}
					if(!empty($data['search']))
					{
						$query = $query->where('gg_order.name','LIKE','%'.$data['search'].'%');
					}
					return $data = $query->select(
						'gg_order.id', 
						'gg_order.userid',
						'gg_order.orderdate', 
						'gg_order.name',
						'gg_order.user_type',
						'gg_order.email',
						'gg_order.totalprice',
						'gg_order.ordernotes',
						'gg_order.created_at',
						'srdt.productname',
						'gg_order.created_at',
						'gg_order.updated_at',
						'gmf.value'
						)->get();
	}
	
	
}
