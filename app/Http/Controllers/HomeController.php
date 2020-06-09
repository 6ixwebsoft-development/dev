<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Redirect;
use Illuminate\Http\Url;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
	
	public function profile()
	{

		return view('profile');
	}
	
	public function passwordhash()
	{
		$password = "LzHN!a@Tod#K";
		echo $pass = Hash::make($password);
		die();
	}
	
}
