<?php

namespace App\Http\Controllers\Admin\Location;

use App\Models\CountryBlock;
use App\Models\Country;
use App\Models\Region;
use App\Models\City;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CityController extends Controller
{
    
    public function __construct()
    {
        
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = City::leftjoin('gg_region', 'gg_city.region_id', '=', 'gg_region.id')
                        ->leftjoin('gg_country', 'gg_city.country_id', '=', 'gg_country.id')
                        ->select(
                                'gg_city.id',
                                'country_name',
                                'region_name',
                                'city_name',
                                'gg_city.status as status'
                            )
                        ->get();
            return Datatables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
       
                               $btn = '<a href="'.url('admin').'/location/city/'.$row->id.'/edit" class="edit btn btn-primary btn-sm">Edit</a>
                                       <a href="'.url('admin').'/location/city/delete/'.$row->id.'" class="delete btn btn-primary btn-sm">Delete</a>';
         
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
        }
        return view('admin.location.city.index');
    }

    public function create(Request $request) {

        $countries = Country::select('id', 'country_name')->get();

        $country_arr = array();
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }

        $regions = Region::select('id', 'region_name')->get();

        $region_arr = array();
        foreach ($regions as $region) {
            $region_arr[$region->id] = $region->region_name;
        }
        return view('admin.location.city.create')->with(compact('region_arr', 'country_arr'));
    }

    public function store(Request $request)
    {
        try {
            
            $input = $request->only(['country_id', 'region_id', 'city_name', 'status']);

            $city = City::create($input);

            $output = ['success' => true,
                            'msg' => __("Module Field value added successfully")
                        ];
        } catch (\Exception $e) {
            $output = ['success' => false,
                            'msg' => __("Something went wrong")
                        ];
        }

        return redirect('admin/location/city')->with('status', $output);

    }

    public function edit($id)
    {
        $city = City::find($id);

        $countries = Country::select('id', 'country_name')->get();

        $country_arr = array();
        foreach ($countries as $country) {
            $country_arr[$country->id] = $country->country_name;
        }

        $regions = Region::select('id', 'region_name')->get();

        $region_arr = array();
        foreach ($regions as $region) {
            $region_arr[$region->id] = $region->region_name;
        }

        return view('admin.location.city.edit')->with(compact("city", "country_arr", "region_arr"));
    }

    public function update(Request $request, $id) 
    {
        try {
                
            $input = $request->only(['country_id', 'region_id', 'city_name', 'status']);
            $city = City::findOrFail($id);

            $city->country_id  = $input['country_id'];
            $city->region_id = $input['region_id'];
            $city->city_name = $input['city_name'];
            $city->status      = $input['status'];
            $city->save();

            $output = ['success' => true,
                            'msg' => __("Module Field updated")
                            ];
        } catch (\Exception $e) {
            
                $output = ['success' => false,
                            'msg' => __("messages.something_went_wrong")
                        ];
        }

        return redirect('admin/location/city')->with('status', $output);
    }

    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $city->delete();
            $output = ['success' => true,
                        'msg' => __("Module Field Deleted")
                        ];
        } catch (\Exception $e) {
        
            $output = ['success' => false,
                        'msg' => __("messages.something_went_wrong")
                    ];
        }

        return redirect('admin/location/city')->with('status', $output);
    }

    public function getCities(Request $request)
    {
        $regionId = $request->input( 'region_id' );
        //echo $countryBlockId;
        $cities = City::where('region_id', $regionId)->get();
        return response()->json($cities);
    }
}
