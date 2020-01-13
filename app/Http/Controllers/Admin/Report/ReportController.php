<?php

namespace App\Http\Controllers\Admin\Report;

use App\Models\Modules;
use App\Models\ModuleField;
use App\Models\ModuleFieldValue;
use App\Models\Subscription;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Subscriptiontype;
use App\Models\Sproduct;
use App\Models\Transaction;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class ReportController extends Controller
{
    public function index(Request $request) {
		$input = $request->all();
		
		$data = Transaction::all();
			if ($request->ajax()) { 
			
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('orderid', function($row) {   
						$controller = '';
						if($row->order_type == 'SUB'){$controller = 'subscription';}
						if($row->order_type == 'ORD'){$controller = 'order';}
					
                          $s_btn='<a href="'.url('admin').'/'.$controller.'/'.$row->orderid.'/edit" class="">'.$row->orderid.'</a>';        
                        return  $s_btn;
                    })
                   ->rawColumns(['orderid'])
                    ->make(true);
        }

		$payment = Payment::pluck('paymentmethod','id')->all();
		$datasubs = Subscriptiontype::all();
		$product= Sproduct::all();
		return view('admin.report.index',compact('payment','datasubs','product'));
	}
	
	public function searchdatabyfilter(Request $request)
	{
		$input = $request->all();
		
		$query = Transaction::orderBy('id', 'DESC');
		if(!empty($input['optionsRadios']))
		{
			if($input['optionsRadios'] == 'show_all')
			{
				
			}
			if($input['optionsRadios'] == 'show_paid')
			{
				$query = $query->whereIn('status',["123","16","11","12","121"]);
			}
			if($input['optionsRadios'] == 'show_not_paid')
			{
				$query = $query->whereIn('status',["124","15","17","128","10","13","14"]);
			}
		}
		if(!empty($input['paymentmood']))
		{
			$query = $query->where('paymentmood',$input['paymentmood']);
		}
		if(!empty($input['productids']))
		{
			$query = $query->whereIn('productid',$input['productids'])->where('order_type','ORD');
		}
		if(!empty($input['subscids']))
		{
			$query = $query->whereIn('productid',$input['subscids'])->where('order_type','SUB');
		}
		if(!empty($input['startdate']) || !empty($input['expiry_date']))
		{
			$query = $query->whereBetween('orderdate', array(date("Y-m-d", strtotime($input['startdate'])), date("Y-m-d", strtotime($input['expiry_date']))));
		}
		//DB::enableQueryLog();
		 $datas = $query->get();
		// dd(DB::getQueryLog());exit;
		if ($request->ajax()) { 
			
            return Datatables::of($datas)
                    ->addIndexColumn()
                    ->editColumn('orderid', function($row) {   
						$controller = '';
						if($row->order_type == 'SUB'){$controller = 'subscription';}
						if($row->order_type == 'ORD'){$controller = 'order';}
					
                          $s_btn='<a href="'.url('admin').'/'.$controller.'/'.$row->orderid.'/edit" class="">'.$row->orderid.'</a>';        
                        return  $s_btn;
                    })
                   ->rawColumns(['orderid'])
                    ->make(true);
        }
		
	}
}
