<?php

namespace App\Http\Controllers;

use App\ApiReturn;
use App\Functions;
use App\Mail\ResetPass;
use App\Mail\UserActive;
use App\Mail\UserRegister;
use App\Rules\Emails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

    private $func;
    public function __construct(){
        $this->func = new Functions;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return = ['status' => false, 'message' => "Invalid User",'error' => "Invalid User"];
    	$data = ['email' => request('email'),'password' => request('password'),'status' =>1];
    	if(Auth::attempt($data)){
            unset($return['error']);
            $return['data'] = Auth::user();
    		$return['status'] = true;
    		$return['message'] = "Login Success";
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->fb_token = request('fb_token');
            $user->save();
    	}	
    	return response()->json($return);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {	


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    	
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'numeric','digits:10','unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'fb_token' => []
        ]);

        if($validator->fails()){        	
        	return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }	 
        $data = $validator->getData();
        $data['password'] = Hash::make($data['password']);
        $data['api_token'] = Str::random(60);
        $data['otp'] = rand(1000,9999);        
        $UserInfo = User::create($data);
        $UserInfo['otp'] = $data['otp'];

        Mail::to($UserInfo->email)->send(new UserRegister($UserInfo));
        if(!empty($UserInfo)){
        	return response()->json(['status' => true, 'message' => $this->func->lang_slug("We Have Sent An Otp To Your Number"), "data" => $UserInfo]);
        }else{
        	return response()->json(['status' => false, 'message' => $this->func->lang_slug("Something Went Wronge")]);
        }    	
    }

    public function UserActive(Request $request)
    {
    	$validator = Validator::make($request->all(), [            
            'email' => ['required', 'string', 'email', 'max:255'],
            'otp' => ['required', 'string', 'max:4'],
        ]);

        if($validator->fails()){        	
        	return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }
        $user = new User;
        if($user->userOtpCheckActivate($validator->getData())){
            $user = $validator->getData();
            //print_r($user);
            $user = User::where(['email' => $user['email']])->first();
            //print_r($user);
            Mail::to($user->email)->send(new UserActive($user));
        	return response()->json(['status' => true, 'message' => $this->func->lang_slug("Registration Success !!")]);	
        }else{
        	return response()->json(['status' => false, 'message' => $this->func->lang_slug("Invalid OTP"),'error' => 'Invalid OTP']);	
        }
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
    public function edit($id)
    {
        //
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request
     * @return \Illuminate\Http\Response
     */
    public function UserProfile(Request $request) {
        $user = new User;
        $validator = Validator::make($request->all(), [            
            'image' => ['required','image','mimes:jpeg,jpg','max:2048'],            
        ]);

        if($validator->fails()){
            // $validator1 = Validator::make($request->all(), [            
            //     'url' => ['required'],            
            // ]);            
            // if($validator1->fails()){
                //return response()->json(['status' => false, 'message' => "All fields are Mandetory", "error" => ['image/url'=>'The image/url field is required.',]]);
                return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
                
            //}
        }
        $data = $validator->getData();
        // if(!empty($data['url'])){            
        //     $return = $user->upload_via_url($data['url']);
        // }else{
            $return = $user->UserProfile($request,'image');
        //}   
        
        if($return){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Image Uploaded !!")]);
        }else{
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Something Went Wrong!!"),'error' => "Something Went Wrong!!"]);
        }
    }

    public function return($status,$msg)
    {
    	$return = new ApiReturn();
    	return response()->json($return->return($status,$msg));
    }

    public function emailTest($id)
    {
        $user = User::find($id);

        //print_r($user->email);
        //mail($user->email,"asasasa","2132132132323");
        Mail::to($user->email)->send(new UserActive($user));
    }

    public function resetPassword(Request $request)
    {   
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }

        $data = $validator->getData();
        $user = User::where("email",$data['email'])->first();
        //print_r($data);
        if(!empty($data['otp'])){
            $validator = Validator::make($request->all(),[
                'email' => ['required', 'string', 'email', 'max:255'],
                'otp' => ['required','min:4','max:4'],
                'password' => ['required', 'string', 'min:8']
            ]);

            if($validator->fails()){
                return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
            }
            $data = $validator->getData();
            if($user->otp == $data['otp']){
                $user->password = Hash::make($data['password']);
                $user->status = 1;
                $user->save();
                return response()->json(['status' => true, 'message' => $this->func->lang_slug("Password Reset Successfully")]);
            }else{
                return response()->json(['status' => false, 'message' => $this->func->lang_slug("Incorrect OTP, Try Again !!"),"error" => ["email"=>['Incorrect OTP, Try Again !!']]]);
            }
            
        }else{
            
            if(!empty($user)){
                $user->otp = rand(1000,9999);
                $user->save();
                Mail::to($user->email)->send(new ResetPass($user));
                return response()->json(['status' => true, 'message' => $this->func->lang_slug("We have Sent an OTP to Your Email")]);   
            }else{
                return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => ["email"=>['Invalid Email-Id']]]);   
            }
        }
        
    }
    function resendemail(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if($validator->fails()){
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }

        $data = $validator->getData();
        $user = User::where("email",$data['email'])->first();
        $UserInfo = ['name' => $user->name,'otp' => $user->otp];
        Mail::to($user->email)->send(new UserRegister($UserInfo));
        return response()->json(['status' => true, 'message' => $this->func->lang_slug("We have Re-Sent an OTP to Your Email")]);
    }
    function messengers(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'recipients' => ['required',new Emails('mail')],
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("All fields are Mandetory"), "error" => $validator->messages()]);
        }
        // echo "<pre>";
        $data = $validator->getData();        
        // print_r(Auth::user());
        $user = User::find(Auth::user()->id);
        if(empty($user)){
            return response()->json(['status' => false, 'message' => $this->func->lang_slug("Invalid User")]);
        }
        $user->messengers = $data['recipients'];
        if($user->save()){
            return response()->json(['status' => true, 'message' => $this->func->lang_slug("Messengers Saved !!!")]);
        }

    }
}