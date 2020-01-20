<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
 
class Order extends Model
{
    protected $table = 'gg_order';
	
	protected $appends  = [
		'pstatus',
	];
	
	
	 public function getPstatusAttribute()
    {
		$data= '';
	   if(!empty($this->orderstatus))
	   {
		$data = DB::table('gg_module_fields_values') ->where('id',$this->orderstatus)->first();
	   
		$color = '';
	     if($this->orderstatus == 12 ||$this->orderstatus == 121  )
		  {
			 $color = 'success';
		  }
		  if($this->orderstatus == 10)
		  {
			 $color = 'warning';
		  }
		  if($this->orderstatus == 14)
		  {
			 $color = 'dark';
		  }
		  if($this->orderstatus == 13)
		  {
			 $color = 'light';
		  }
		  if($this->orderstatus == 11)
		  {
			 $color = 'primary';
		  }
	  
		   $data = '<label class="badge badge-'.$color.'">'.$data->value .'</label>';
	   }
		return $data;
       
    }
	
}
