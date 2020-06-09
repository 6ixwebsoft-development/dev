<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Libraryremoteip extends Model
{
   protected $table = 'libraryremoteips';       static function delete_data($id)	{		$data = array(			'remotedigit'=>null,			'remoteid'=>null,		);		$queryRun = Libraryremoteip::where('libraryid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
