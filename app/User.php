<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends  = [
        'tstatus','rolename',
    ];

    const USER00 = 'User00';
    const USER30 = 'User30';
    //const MANAGER_TYPE = 'manager';

    // public function getStatusAttribute($value)
    // {
    //     switch ($value) {
    //         case 1:
    //             return "Active";
    //             break;
    //         case 0:
    //             return "Inactive";
    //             break;
            
    //         default:
    //             return $value;
    //             break;
    //     }
    // }
    public function getTstatusAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<label class="badge badge-success">Active</label>';
                break;
            case 0:
                return '<label class="badge badge-danger">Inactive</label>';
                break;
            case 2:
                return '<label class="badge badge-warning">Banned</label>';
                break;
			case 3:
                return '<label class="badge badge-warning">Delete</label>';
                break;	
            default:
                return $this->status;
                break;
        }
    }
	
	 public function info()
    {    	
        return $this->hasMany('App\Models\Userinfo','userid');
    }
	
	 public function getRolenameAttribute()
    {    	
      return $this->getRoleNames();
    }
	
    public function allPermissions()
    {
        return $this->roles()->with('permissions')->get()->map(function ($item) {
            return $item->permissions->pluck('name');
        })->flatten()->merge($this->permissions->pluck('name'));
    }
    public function is($v)
    {
        //const USER = $v;
        //dd($this->role);
        //dd($this->roles->first()->name);
        //print_r($this->roles->toArray());
        
        $data = $this->subscription();
        //dd($data);        
        if(strpos($data, $v) !== false ){
            return true;
        }
        return false;
        
    }
    
    public function subscription()
    {

        $d = [
                'userid' => $this->id,
                "status" => 1
                ];
        $sub = DB::table('gg_subscription')->where($d)->orderBy('end_date',"desc")->first();

        if(!empty($sub->end_date) && date('y-m-d') <= date('y-m-d',strtotime($sub->end_date))){
            return DB::table('gg_module_fields_values')->where('id',$sub->id)->first()->value;
        }
        return $this->roles->first()->name;
    }
}
