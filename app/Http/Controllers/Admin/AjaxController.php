<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
