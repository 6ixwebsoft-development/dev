<?php

namespace App\Http\Controllers\Admin\Location;

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class RegionController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {

        if ($request->ajax()) {
            $data = Region::leftjoin('gg_country', 'gg_region.country_id', '=', 'gg_country.id')
                                ->select(
                                        'gg_region.id',
                                        'country_name',
                                        'region_name',
                                        'gg_region.status as status'
                                    )
                                ->get();
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
       							$txt = "'Are you sure to delete this?'";
                               $btn = '<a href="'.url('admin').'/location/region/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                       <a onclick="return confirm('.$txt.')" href="'.url('admin').'/location/region/delete/'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</a>';
         
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('admin.location.region.index');
    }

    public function create(Request $request) {
        $countries = Country::select('id', 'country_name')->get();

        $country_arr = array();
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }
        
        return view('admin.location.region.create')->with("countries", $country_arr);
    }

    public function store(Request $request)
    {
        try {
            
            $input = $request->only(['country_id', 'region_name', 'status']);

            $region = Region::create($input);

            $output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/location/region')->with('status', $output);

    }

    public function edit($id)
    {
        $region = Region::find($id);
        $countries = Country::select('id', 'country_name')->get();

        $country_arr = array();
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }
        
        return view('admin.location.region.edit')->with(compact('region', 'country_arr'));
    }

    public function update(Request $request, $id) 
    {
        try {

            $input = $request->only(['country_id', 'region_name', 'status']);    
            $region = Region::findOrFail($id);
            
            $region->country_id  = $input['country_id'];
            $region->region_name = $input['region_name'];
            $region->status      = $input['status'];
            $region->save();

            $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
        } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return redirect('admin/location/region')->with('status', $output);
    }

    public function destroy($id)
    {
        try {
            
            $region = Region::findOrFail($id);
            $region->delete();

            $output = ['success' => true,
                        'msg' => __("Module Field Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/location/region')->with('status', $output);
    }

    public function getRegions(Request $request)
    {
        $countryId = $request->input( 'country_id' );
        //echo $countryBlockId;
        $regions = Region::where('country_id', $countryId)->get();
        return response()->json($regions);
    }

}
