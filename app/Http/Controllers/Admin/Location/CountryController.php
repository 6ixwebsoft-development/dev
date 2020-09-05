<?php

namespace App\Http\Controllers\Admin\Location;

use App\Models\CountryBlock;
use App\Models\Country;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CountryController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {
        if ($request->ajax()) {

            $data = Country::leftjoin('gg_country_block AS cb', 'gg_country.nation_id', '=', 'cb.id')
                            ->select(
                                    'gg_country.id',
                                    'cb.name as block_name',
                                    'country_code',
                                    'country_name',
                                    'calling_code',
                                    'gg_country.status as status'
                                )
                            ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   						$txt = "'Are you sure to delete this?'";
                           $btn = '<a href="'.url('admin').'/location/country/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                            <a onclick="return confirm('.$txt.')"  href="'.url('admin').'/location/country/delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.location.country.index');
    }

    public function create(Request $request) {

        $blocks = CountryBlock::select('id', 'name')->get();

        $blocks_arr = array();
        foreach ($blocks as $block) {
            $blocks_arr[$block->id] = $block->name;
        }
        return view('admin.location.country.create')->with("blocks", $blocks_arr);
    }

    public function store(Request $request)
    {
        try {
            
            if(empty($request->All()['status'])){
                $input['status'] = 0;
            }else{
                $input['status'] = $request->All()['status'];
            }

            $input = $request->only(['nation_id', 'country_code', 'country_name', 'calling_code', 'status']);

            $country = Country::create($input);
            
            $output = ['success' => true,
                            'msg' => __("Country added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/location/country')->with('status', $output);

    }

    public function edit($id)
    {
        $country = Country::find($id);
        $countryBlock = CountryBlock::select('id', 'name')->get();

        $block_arr = array();
        foreach ($countryBlock as $block) {
            $block_arr[$block->id] = $block->name;
        }
        
        return view('admin.location.country.edit')->with(compact('country', 'block_arr'));
    }

    public function update(Request $request, $id) 
    {
        try {

            $input = $request->only(['nation_id', 'country_code', 'country_name', 'calling_code']);

            if(empty($request->All()['status'])){
                $input['status'] = 0;
            }else{
                $input['status'] = $request->All()['status'];
            }

            $country = country::findOrFail($id);
                
            $country->nation_id = $input['nation_id'];
            $country->country_code = $input['country_code'];
            $country->country_name = $input['country_name'];
            $country->calling_code = $input['calling_code'];
            $country->status = $input['status'];
            $country->save();

            $output = ['success' => true,
                            'msg' => __("Country updated")
                            ];
        } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("something went wrong")
                        ];
        }

        return redirect('admin/location/country')->with('status', $output);
    }

    public function delete($id)
    {
        try {
            
            $country = Country::findOrFail($id);
            $country->delete();

            $output = ['success' => true,
                        'msg' => __("Country Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("something went wrong")
                    ];
        }

        return redirect('admin/location/country')->with('status', $output);
    }

    public function getCountries(Request $request)
    {
        $countryBlockId = $request->input( 'country_block_id' );
        $countries = Country::where('nation_id', $countryBlockId)->get();
        //$countries[] = ['id' => 0, 'country_name' => 'select'];
        return response()->json($countries);
    }
}
