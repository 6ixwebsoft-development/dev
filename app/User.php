<?php

namespace App;

use App\User;
use DateTime;
use Illuminate\Auth\validate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = [];    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','otp'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        "dayold",
    ];

    protected $image_path = '/images/users';

    public function userOtpCheckActivate($request)
    {   
        extract($request);
        //print_r(['email' => $email, 'otp' => $otp]);
        $user = User::where(['email' => $email, 'otp' => $otp])->first();        
        if(!empty($user) && $user->count() > 0){
            $user = User::find($user->id);
            $user->status = 1;
            $user->save();
            return true;
        }
        return false;
    }

    public function UserProfile($request,$f_name) {
        if ($request->hasFile($f_name)) {
            $image = $request->file($f_name);
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->image_path);
            $image->move($destinationPath, $name);
            //$this->save();
            //dd($name);
            Auth()->user()->image = $name;

            Auth()->user()->save();
            return true;
        }
        return false;
    }
    public function upload_via_url($url){
        //$url = "http://www.google.co.in/intl/en_com/images/srpr/logo1w.png";
        //ini_set("allow_url_fopen", 1);
        $contents = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        $ext = explode(".",$name)[1];
        $name = time().'.'.$ext;
        $destinationPath = public_path($this->image_path)."/".$name;
        Storage::put($destinationPath, $contents);
    }
    public function getImageAttribute($Attribute)
    {        
        return URL($this->image_path."/".$Attribute);
    }
    public function getMobileAttribute($Attribute)
    {        
        return "+".$this->country_code."-".$Attribute;
    }
    public function getDayoldAttribute($Attribute)
    {
        
        $fdate = date('y-m-d',strtotime($this->created_at));
        $tdate = date('y-m-d');
        $datetime1 = new DateTime($fdate);        
        $datetime2 = new DateTime($tdate);
        $interval = $datetime1->diff($datetime2);
        $interval = $interval->format('%a');//now do whatever you like with $days
        //$interval += 1;
        return $interval+1;
    }
}
