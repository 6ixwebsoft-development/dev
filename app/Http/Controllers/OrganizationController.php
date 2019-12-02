<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Spatie\Permission\Models\Role;
use App\User;
//use DB;
//use Hash;
class OrganizationController extends Controller
{
    
	public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
        ]);
     
        $user = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        );
        
        $user['password'] = Hash::make($user['password']);
        $subscribe_user = User::create($user);
                           
    
        return view('subscription')
                        ->with('success','Subscription created successfully');
    }
}
