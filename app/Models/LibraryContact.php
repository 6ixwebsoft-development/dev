<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class LibraryContact extends Model
{
   protected $table = 'library_contact';      
   
   static function get_mobile($id)
   {	   
		$data = LibraryContact::where('userid',$id)->first();
		if(!empty($data))
		{
			return $data->mobile;
		}else{
			return '---'; 
		}
	}
	
	static function delete_data($id)
	{
		$data = array(
			'contactname'=>null,
			'email'=>null,
			'phone'=>null,
			'mobile'=>null,
			'website'=>null,
			'remotearena'=>null,
			'contactaddress'=>null,
			'contactzip'=>null,
			'contactcountry'=>null,
			'contactcity'=>null,
			'postaladdress'=>null,
			'postalzip'=>null,
			'postalcountry'=>null,
			'postalcity'=>null,
			'about_sve'=>'DELETE_'.$id.'@globalgarnt.com',
			'about_eng'=>'DELETE_'.$id.'@globalgarnt.com',
		);
		$queryRun = LibraryContact::where('userid', $id)->update($data);
		if($queryRun)
		{
			return true;
		}else{
			return false;
		}
	}
	
}
