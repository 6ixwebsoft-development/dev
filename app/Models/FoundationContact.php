<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundationContact extends Model
{
    //
	protected $table = 'gg_foundation_contact';
    protected $guarded = [];			static function get_mobile($id)   {	   $data = FoundationContact::where('foundation_id',$id)->first();	   if(!empty($data))	   {		   return $data->mobile_no;	   }else{		   return '---'; 	   }      }
}
