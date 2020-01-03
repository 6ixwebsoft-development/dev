<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Foundation extends Model
{

	protected $table = 'gg_foundation';
    protected $guarded = [];
	/* public $tablegetdata = ['contact','location']; */
	 
	protected $appends  = [
        'tstatus',
    ];
	
    public function age()
    {    	
        return $this->hasMany('App\Models\FoundationAge','foundation_id');
    }

    public function advertise()
    {    	
        return $this->hasMany('App\Models\FoundationAdvertise','foundation_id');
    }
    public function appication()
    {    	
        return $this->hasMany('App\Models\FoundationApplication','foundation_id');
    }
    public function contact()
    {    	
        return $this->hasMany('App\Models\FoundationContact','foundation_id');
    }
    public function dates()
    {    	
        return $this->hasMany('App\Models\FoundationDates','foundation_id');
    }
    public function gender()
    {    	
        return $this->hasMany('App\Models\FoundationGender','foundation_id');
    }
    public function instructions()
    {    	
        return $this->hasMany('App\Models\FoundationInstructions','foundation_id');
    }
    public function location()
    {    	
        return $this->hasMany('App\Models\FoundationLocation','foundation_id');
    }
    public function purpose()
    {    	
        return $this->hasMany('App\Models\FoundationPurpose','foundation_id');
    }
    public function savecount()
    {    	
        return $this->hasMany('App\Models\FoundationSaveCount','foundation_id');
    }
    public function subjects()
    {    	
        return $this->hasMany('App\Models\FoundationSubject','foundation_id');
    }
	
	static function alldata($id)
	{
		$tablegetdata = ['contact','location'];
		return Foundation::find($id)->with($tablegetdata)->get();
	}
	
	 public function getTstatusAttribute()
    {
        switch ($this->status) {
            case "Active":
                return '<label class="badge badge-success">Active</label>';
                break;
            case "Expired":
                return '<label class="badge badge-danger">Expired</label>';
                break;
			case "NoAppl":
				return '<label class="badge badge-info">NoAppl</label>';
				break;
			case "NoGG":
				return '<label class="badge badge-info">NoGG</label>';
				break;				
			case "NoAdr":
				return '<label class="badge badge-info">NoAdr</label>';
				break;
			case "Double":
				return '<label class="badge badge-info">Double</label>';
				break;
				
            default:
                return $this->status;
                break;
        }
    }
   
}

