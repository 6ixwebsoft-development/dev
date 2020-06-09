<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Libraryips extends Model
{
    protected $table = 'libraryips';		static function delete_data($id)	{		$data = array(			'from'=>null,			'to'=>null,		);		$queryRun = Libraryips::where('libraryid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
