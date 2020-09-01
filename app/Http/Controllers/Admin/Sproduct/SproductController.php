<?php

namespace App\Http\Controllers\Admin\Sproduct;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Offices;
use App\Models\Payment;
use App\Models\Sproduct;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SproductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Sproduct::where('status', '!=', '3')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('typeid', function ($row) {
                    if ($row->typeid == 1) {
                        $s_btn = '<span class="badge badge-success">Ongoing monthly subscription</span>';
                    } else if ($row->typeid == 2) {
                        $s_btn = '<span class="badge badge-success">Stora Fondboken</span>';
                    } else if ($row->typeid == 3) {
                        $s_btn = '<span class="badge badge-success">Lists</span>';
                    } else {
                        $s_btn = '<span class="badge badge-success">Services</span>';
                    }
                    return $s_btn;
                })
                ->escapeColumns([])
                ->addColumn('action', function ($row) {
                    $txt = "'Are you sure to delete this?'";
                    $btn = '<a href="' . url('admin') . '/product/' . $row->id . '/edit" class="edit btn btn-primary btn-sm">Edit</a>
					<a onclick="return confirm(' . $txt . ')" href="' . url('admin') . '/product/delete/' . $row->id . '" class="delete btn btn-danger btn-sm"   >Delete</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->addColumn('checkbox', function ($row) {

                    $btn = '<input type="checkbox" name="userslistIds"  id="userslistIds" value="' . $row->id . '">';

                    return $btn;
                })
                ->rawColumns(['checkbox'])
                ->make(true);
        }

        return view('admin.sproduct.index');
    }

    public function create()
    {
        $language = Language::where('status', '1')->pluck('language', 'id')->all();
        $office   = Offices::pluck('office', 'id')->all();
        $payment  = Payment::pluck('paymentmethod', 'id')->all();
        //$userlangs = Language::all();
        return view('admin.sproduct.create')->with(compact('language', 'office', 'payment'));
    }

    public function store(Request $request)
    {
        //print_r($request->all());exit;

        $requests = $request->toArray();
        $validate = Validator::make($requests, [
            'productname'    => 'required',
            'languageid'     => 'required',
            'officeid'       => 'required',
            'typeid'         => 'required',
            'price'          => 'required|integer',
            'discountamount' => 'integer',
            'vatamount'      => 'integer',
            'freightamount'  => 'integer',
            'freighttax'  => 'integer',
        ]);

        $validate->setAttributeNames(
        		[
        			'freightamount' => 'Freight Charge',
        			'vatamount' => 'Vat %',
        			'freighttax' => 'Freight Tax %'
        		]
        	);
        $validate->validate();


        if (empty($request->discountamount)) {
            $discount = 0;
        } else {
            $discount = $request->discountamount;
        }
        if (empty($request->vatamount)) {
            $vatamount = 0;
        } else {
            $vatamount = $request->vatamount;
        }
        if (empty($request->freightamount)) {
            $freightamount = 0;
        } else {
            $freightamount = $request->freightamount;
        }
        if (empty($request->freighttax)) {
            $freighttax = 0;
        } else {
            $freighttax = $request->freighttax;
        }

        $data = array(
            "productname"     => $request->productname,
            "languageid"      => $request->languageid,
            "officeid"        => $request->officeid,
            "typeid"          => $request->typeid,
            "currency"        => $request->currency,
            "price"           => $request->price,
            "display"         => $request->display,
            "paymentmood"     => $request->paymentmood,
            "discountlabel"   => $request->discountlabel,
            "discountamount"  => $discount,
            "vatlabel"        => $request->vatlabel,
            "vatamount"       => $vatamount,
            "freightlabel"    => $request->freightlabel,
            "freightamount"   => $freightamount,
            "freighttaxlabel" => $request->freighttaxlabel,
            "freighttax"      => $freighttax,
            "totalprice"      => $request->totalprice,
            "description"     => $request->description,
            "created_at"      => now(),
        );

        $Sproduct = Sproduct::insert($data);
        if ($Sproduct) {
            $output = ['class' => 'alert-position-success',
                'msg'              => __("Product created"),
            ];
        } else {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("Product Not create"),
            ];
        }

        return redirect('admin/products')->with('message', $output);
    }

    public function edit($id)
    {
        $product  = Sproduct::find($id);
        $language = Language::where('status', '1')->pluck('language', 'id')->all();
        $office   = Offices::pluck('office', 'id')->all();
        $payment  = Payment::pluck('paymentmethod', 'id')->all();
        return view('admin.sproduct.edit')->with(compact('product', 'language', 'office', 'payment'));
    }

    public function update(Request $request, $id)
    {
        $requests = $request->toArray();
        $validate = Validator::make($requests, [
            'productname'    => 'required',
            'languageid'     => 'required',
            'officeid'       => 'required',
            'typeid'         => 'required',
            'price'          => 'required|integer',
            'discountamount' => 'integer',
            'vatamount'      => 'integer',
            'freightamount'  => 'integer',
            'freighttax'  => 'integer',
        ]);

        $validate->setAttributeNames(
        		[
        			'freightamount' => 'Freight Charge',
        			'vatamount' => 'Vat %',
        			'freighttax' => 'Freight Tax %'
        		]
        	);
        $validate->validate();
        
        if (empty($request->discountamount)) {
            $discount = 0;
        } else {
            $discount = $request->discountamount;
        }
        if (empty($request->vatamount)) {
            $vatamount = 0;
        } else {
            $vatamount = $request->vatamount;
        }
        if (empty($request->freightamount)) {
            $freightamount = 0;
        } else {
            $freightamount = $request->freightamount;
        }
        if (empty($request->freighttax)) {
            $freighttax = 0;
        } else {
            $freighttax = $request->freighttax;
        }

        $product = Sproduct::find($id);

        $product->productname     = $request->input('productname');
        $product->languageid      = $request->input('languageid');
        $product->officeid        = $request->input('officeid');
        $product->typeid          = $request->input('typeid');
        $product->currency        = $request->input('currency');
        $product->price           = $request->input('price');
        $product->display         = $request->input('display');
        $product->paymentmood     = $request->input('paymentmood');
        $product->discountlabel   = $request->input('discountlabel');
        $product->discountamount  = $discount;
        $product->vatlabel        = $request->input('vatlabel');
        $product->vatamount       = $vatamount;
        $product->freightlabel    = $request->input('freightlabel');
        $product->freightamount   = $freightamount;
        $product->freighttaxlabel = $request->input('freighttaxlabel');
        $product->freighttax      = $freighttax;
        $product->totalprice      = $request->input('totalprice');
        $product->description     = $request->input('description');
        $product->updated_at      = now();

        $product->save();
        if ($product) {
            $output = ['class' => 'alert-position-success',
                'msg'              => __("Product updated"),
            ];
        } else {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("Product Not update"),
            ];
        }

        return redirect('admin/products')->with('message', $output);
    }

    public function delete($id)
    {
        try {

            $Sproduct = Sproduct::findOrFail($id);
            $Sproduct->delete();
            $output = ['class' => 'alert-position-success',
                'msg'              => __("Product deleted"),
            ];
        } catch (\Exception $e) {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("something went wrong!"),
            ];
        }
        return back()->with('message', $output);
    }

    public function changestatus(Request $request)
    {

        if ($request->txt == 'sts') {
            $data = array(
                'status' => $request->val,
            );
        } else {
            $data = array(
                'orderstatus' => $request->val,
            );
        }

        $queryRun = DB::table('sproduct')->whereIn('id', $request->favorite)->update($data);

        if ($queryRun) {
            $output = ['class' => 'alert-position-success',
                'msg'              => __("Product Deleted"),
            ];
            return 'yes';
        } else {
            $output = ['class' => 'alert-position-danger',
                'msg'              => __("Product not Deleted"),
            ];
            return 'no';
        }
    }

}
