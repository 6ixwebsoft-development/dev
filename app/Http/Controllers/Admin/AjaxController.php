<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getCountry($countryBlock)
    {
    	return $countryBlock;
    }

    public function getRegion($countryBlock)
    {
    	return $countryBlock;
    }

    public function get($countryBlock)
    {
    	return $countryBlock;
    }
    public function unique(Request $request)
    {
        $input = $request->all();
        if (User::where('email', '=', $input['email'])->exists()) {
           return ["status" => "false","msg" => "<span class='email__msg text-danger'>Not Available</span>"];
        }
        return ["status" => "true","msg" => "<span class='email__msg text-success'>Email Available</span>"];
    }
}
