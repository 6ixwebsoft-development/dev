<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Userinfo;
use Spatie\Permission\Models\Role;
use App\Models\Individual;use App\Models\IndividualContact;use App\Models\IndividualPersonal;use App\Models\IndividualPerpose;use App\Models\IndividualStudy;use App\Models\IndividualCare;use App\Models\IndividualWalfare;use App\Models\IndividualResearch;use App\Models\IndividualProject;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),						'status' =>1,						'user_type' => 'IND',
        ]);
		$userId = $user->id;
		$role = 'User10 - Registered Free User';
		$user->assignRole($role);
		$user_id = $user->id;
		$basicinfo = array(				"userid"  => $user_id ,				"firstname"  =>  $data['name'],				"lastname"  => 	 $data['name'], 				"availability" => 1,				"created_at"  => Now(),				);								$indId = Individual::insertGetId($basicinfo);				$contactinfo = array(				"userid"  => $user_id ,				"created_at"  => Now(),				);								IndividualContact::insert($contactinfo);				$personalinfo = array(				"userid"  => $user_id ,				"individualid"  => $indId,				"created_at"  => Now(),				);								IndividualPersonal::insert($personalinfo);					$purposelist = array(					"userid" => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualPerpose::insert($purposelist);						$study = array(					"userid"  => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualStudy::insert($study);				$care = array(					"userid"  => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualCare::insert($care);				$walfare = array(					"userid"  => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualWalfare::insert($walfare);					$research = array(					"userid"  => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualResearch::insert($research);						$project = array(					"userid"  => $user_id ,					"individualid"  => $indId,					"created_at"  => Now(),				);				IndividualProject::insert($project);				
		return $user;
    }
}
