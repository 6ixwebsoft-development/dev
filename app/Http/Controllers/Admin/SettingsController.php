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
        //Config::get('constants.settings.LANGUAGE_ID');
    	return view('admin.settings')->with(compact('settings'));;
    }

    public function getSettings(Request $request) {
    	if ($request->ajax()) {
    		
    		$setting_name  = $request->get('settingName');
    		$setting_value = $request->get('settingValue');
    		//echo $setting_name . '-------' . $setting_value;
    	}
    }

}
