<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;
use App\User;
use Illuminate\Support\Facades\Auth;

class MemberpageController extends Controller
{
    public function __construct()
    {
        if(empty($user = Auth::user())){
			return redirect('/login');
		}
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
		$function_info = array(
			'YOUR SAVED FUND RECORDS'=>'foundations',
			'YOUR NAME'=>'basicinfo',
			'YOUR CONTACT DETAILS'=>'contactinfo',
			'YOUR LOGIN DETAILS'=>'admin',
			' REGISTER YOUR LIBRARY CARD'=>'cardnumber'
		);
		$id = Auth::user()->id;
		return view('profile')->with(compact('function_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
