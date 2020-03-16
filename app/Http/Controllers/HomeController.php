<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Redirect;

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
	
	public function language($lan)
	{
		//echo $lan;exit;
		Session::put('language', $lan);
		//echo Session::get('language'); 
		return redirect()->back();
	}
	
}
