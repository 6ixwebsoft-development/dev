<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualProject extends Model
{
     protected $table = 'individual_project';	 	static function delete_data($id)	{		$data = array(			'projectobject'=>null,			'projectpurpose'=>null,			'projectgeoarea'=>null,			'projectbeneficiries'=>null,			'projectotherinfo'=>null,		);		$queryRun = IndividualProject::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
