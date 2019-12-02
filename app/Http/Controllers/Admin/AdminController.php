<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    
    /*public function __construct()
    {
       $this->middleware('auth'); 
    }*/

    public function index() {
    	//auth()->user()->assignRole('s_admin');
        return view('admin.index');
    }
}
