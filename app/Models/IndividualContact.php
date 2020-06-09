<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualContact extends Model
{
   protected $table = 'individual_contact';         static function get_mobile($id)   {	   $data = IndividualContact::where('userid',$id)->first();	   if(!empty($data))	   {		   return $data->mobile;	   }else{		   return '---'; 	   }	     }   
   
   
   static function delete_data($id)
	{
		$data = array(
			'streetadress'=>null,
			'zipcode'=>null,
			'country'=>null,
			'region'=>null,
			'city'=>null,
			'personal'=>null,
			'mobile'=>null,
			'phone'=>null,
		);
		$queryRun = IndividualContact::where('userid', $id)->update($data);
		if($queryRun)
		{
			return true;
		}else{
			return false;
		}

	}
	
	
}
