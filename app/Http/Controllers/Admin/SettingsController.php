<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Language;
use Config;

class SettingsController extends Controller
{
    
    public function index() {
        
        $settings = Settings::all();
        //dd($settings);
        //Config::get('constants.settings.LANGUAGE_ID');        
        
        foreach ($settings as $row){
            //echo $row->value;
            app('config')->set($row->system_name,$row->value);
        }
        //app('config')->get('SHOW_NUM_SEARCH_ADVANCE');
        
    	return view('admin.settings')->with(compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->get('data');

        foreach ($data as $key => $value) {
            foreach ($value as $k => $val) {
                $s = Settings::find($key);
                $s->value = $val;

                $s->save();
            }
        }
        
        return redirect('admin/settings');
    }

    public function getSettings(Request $request) {
    	if ($request->ajax()) {
    		
    		$setting_name  = $request->get('settingName');
    		$setting_value = $request->get('settingValue');
            $show_num_search_advance = $request->get('show_num_search_advance');

            //Settings::insert();
    		
    	}
    }

}
