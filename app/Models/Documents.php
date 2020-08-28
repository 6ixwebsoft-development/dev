<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Documents extends Model
{
   protected $table = 'tbl_images';

   static function delete_data($id) {
		
		//$data = array('childerndob' => null, 'childerngender' => null, 'childernschool' => null, 'childernlocation' => null);
		$queryRun = Documents::where('userid', $id)->get();
		if($queryRun){
			
			foreach ($queryRun as $row) {
				// echo $row->name;
				// die();
				$file = 'uploads/images/'.$row->name;
				if (file_exists($file)) {
					unlink($file);
				}
				// if (!unlink('uploads/images/'.$row->name)) { 
				//    echo ("$row->name cannot be deleted due to an error"); 
				// } 				
			}

			Documents::where('userid', $id)->delete();
			// $query = DB::getQueryLog();
			// print_r($query);

		}else{

			return false;

		}
	}   
}
