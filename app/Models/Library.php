<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
   protected $table = 'library_basic';
   
   
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
            
            default:
                return $this->status;
                break;
        }
    }
	
	
}
