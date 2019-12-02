<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\UserSubscription;
use Spatie\Permission\Models\Role;
use App\User;
use DB;
use Hash;
class SubscriptionController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
	public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'roles' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
        'price' => 'required',
        'no_of_days' => 'required'
        ]);
     
        $user = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        );
        
        $user['password'] = Hash::make($user['password']);
        $subscribe_user = User::create($user);
        $assign_user = $subscribe_user->assignRole($request->roles);
        $user_id = $subscribe_user->id;
        $role_id = $assign_user['roles'][0]->id;
        $subscription = array(
            'name' => $request->name,
            'role_id' => $role_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $request->status,
            'price' => $request->price,
            'no_of_days' => $request->no_of_days
        );
         $subscription_data = Subscription::create($subscription);
         $subscription_id = $subscription_data->id;
         $user_subscription = array(
                            'user_id' => $user_id,
                            'subscription_id' => $subscription_id
         );
         UserSubscription::create($user_subscription);
                       
    
      //  Subscription::create($input);
        return view('subscription')
                        ->with('success','Subscription created successfully');
    }
}
