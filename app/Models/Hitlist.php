<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hitlist extends Model
{
     protected $table = 'hitlist';
	 
	 
	 protected $appends  = [
        'tstatus',
    ];
	
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
}
