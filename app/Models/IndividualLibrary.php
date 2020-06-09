<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class IndividualLibrary extends Model
{
   protected $table = 'individual_library';      static function delete_data($id)	{		$data = array(			'librarycity'=>null,			'librarycardnumber'=>null,			'librarycomment'=>null,		);		$queryRun = IndividualLibrary::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
