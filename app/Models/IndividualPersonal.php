<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualPersonal extends Model
{
    protected $table = 'individual_personal';		 static function delete_data($id)	{		$data = array(			'gender'=>null,			'civilstatus'=>null,			'occupation'=>null,			'nationality'=>null,			'residenceregion'=>null,			'residencecity'=>null,			'residenceparish'=>null,			'birthregion'=>null,			'birthcity'=>null,			'birthparish'=>null,			'applicationletter'=>null,		);		$queryRun = IndividualPersonal::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
