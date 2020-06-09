<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualChildern extends Model
{
   protected $table = 'individual_childern';      static function delete_data($id)	{		$data = array(			'childerndob'=>null,			'childerngender'=>null,			'childernschool'=>null,			'childernlocation'=>null,		);		$queryRun = IndividualChildern::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
