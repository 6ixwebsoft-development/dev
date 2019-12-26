<?php

namespace App\Http\Controllers\Admin\Payment;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use DataTables;
use DB;

class PaymentController extends Controller
{
	
	public function index(Request $request) 
	{
		if ($request->ajax())
			{
				$data = Payment::all();
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
					$txt = "'Are you sure to delete this?'";
					$btn  = '<a href="'.url('admin').'/paymentmood/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
					<a onclick="return confirm('.$txt.')" href="'.url('admin').'/paymentmood/delete/'.$row->id.'" class="delete btn btn-danger btn-sm"   >Delete</a>';

					return $btn;
				})
				->rawColumns(['action'])
				->make(true);
			}

		return view('admin.payment.index');
	}
	
	public function create()
	{
		return view('admin.payment.create');
	}
	
	public function store(Request $request)
	{
		/* print_r($request->all());exit; */
		$this->validate($request, [
            'paymentmethod' => 'required',
			'testaccount' => 'required',
			'liveaccount' => 'required',
			
        ]);
		
		if(empty($request->input('status')))
		{$status = 0;}else{$status = 1;}
		if(empty($request->input('testmood')))
		{$testmood = 0;}else{$testmood = 1;}
		
		$data = array(
			"paymentmethod" => $request->paymentmethod,
			"daysnet"  => $request->daysnet,
			"testaccount"  => $request->testaccount,
			"testusername"  => $request->testusername,
			"testpassword"   =>  $request->testpassword,
			"testsignature"  => $request->testsignature,
			"liveaccount" => $request->liveaccount,
			"liveusername"  =>$request->liveusername,
			"livepassword"  => $request->livepassword,
			"livesignature"  => $request->livesignature,
			"testmood"   =>  $testmood,
			"otherpreferences"   => 0,
			"status"  => $status,
			"created_at"  => now(),
		);

		$Payment = Payment::insert($data);
		if($Payment){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Paymenthod created")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Paymenthod Not create")
                            ];
		}

		return redirect('admin/paymentmood')->with('message', $output);
	}
	
	public function edit($id)
	{
		$Payment = Payment::find($id);
		return view('admin.payment.edit')->with(compact('Payment'));
	}
	
	public function update(Request $request, $id) 
    {
		/* print_r($request->all());exit; */
		
		$this->validate($request, [
            'paymentmethod' => 'required',
			'testaccount' => 'required',
			'liveaccount' => 'required',
			
        ]);
		
		if(empty($request->input('status')))
		{$status = 0;}else{$status = 1;}
		if(empty($request->input('testmood')))
		{$testmood = 0;}else{$testmood = 1;}
		
		
		$Payment = Payment::find($id);
		
		$Payment->paymentmethod = $request->input('paymentmethod');
		$Payment->daysnet = $request->input('daysnet');
		$Payment->testaccount = $request->input('testaccount');
		$Payment->testusername = $request->input('testusername');
		$Payment->testpassword = $request->input('testpassword');
		$Payment->testsignature = $request->input('testsignature');
		$Payment->liveaccount = $request->input('liveaccount');
		$Payment->liveusername = $request->input('liveusername');
		$Payment->livepassword = $request->input('livepassword');
		$Payment->livesignature = $request->input('livesignature');
		$Payment->testmood = $testmood;
		$Payment->otherpreferences = 0;
		$Payment->status = $status;
		$Payment->updated_at = now();
		
		$Payment->save();
		if($Payment){
			$output	= ['class' => 'alert-position-success',
                            'msg' => __("Paymenthod updated")
                            ];
		}else{
			$output	= ['class' => 'alert-position-danger',
                            'msg' => __("Paymenthod Not update")
                            ];
		}

		return redirect('admin/paymentmood')->with('message', $output);
	}
	
	public function delete($id) { 
        try{
			
		$Payment = Payment::findOrFail($id);
		$Payment->delete();
        $output = ['class' => 'alert-position-success',
                        'msg' => __("Payment deleted")
                        ];
            } catch (\Exception $e) {
                $output = ['class' => 'alert-position-danger',
                            'msg' => __("something went wrong!")
                        ];
        }
        return back()->with('message', $output);
    }
	
	
}
