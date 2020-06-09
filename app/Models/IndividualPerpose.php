<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualPerpose extends Model
{
    protected $table = 'individual_purposelist';		 static function delete_data($id)	{		$data = array(			'purposeid'=>null,		);		$queryRun = IndividualPerpose::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
