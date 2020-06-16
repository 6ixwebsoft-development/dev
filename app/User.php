<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

}
