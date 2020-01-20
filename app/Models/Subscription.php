<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Subscription extends Model
{
  protected $table = 'gg_subscription';
  protected $guarded = [];
  
  protected $appends  = [
		'pstatus','subtypename',
	];
	
	
	 public function getPstatusAttribute()
    {
		$data= '';
	   if(!empty($this->orderstatus))
	   {
			$data = DB::table('gg_module_fields_values') ->where('id',$this->paymentstatus)->first();
	   
		  $color = '';
	     if(!empty($this->paymentstatus)){
		  if($this->paymentstatus == 16 ||$this->paymentstatus == 123 )
		  {
			 $color = 'success';
		  }
		  if($this->paymentstatus == 15 ||$this->paymentstatus == 128 )
		  {
			 $color = 'warning';
		  }
		  if($this->paymentstatus == 17 ||$this->paymentstatus == 124 )
		  {
			 $color = 'dark';
		  }
		 }
		   $data = '<label class="badge badge-'.$color.'">'.$data->value .'</label>';
	   }
		return $data;
       
    }
	
	public function getSubtypenameAttribute()
	{
		$data= '';
	   if(!empty($this->orderstatus))
	   {
		 $data = DB::table('subscriptiontype') ->where('id',$this->subscriptiontype_id)->first();
		return $data->eng_name;
	   }
	   return $data;
	}
  
 
}
