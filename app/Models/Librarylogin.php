<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Librarylogin extends Model
{
   protected $table = 'librarylogin';      static function delete_data($id)	{		$data = array(			'activeip'=>null,			'remotename'=>null,			'remoteactiveip'=>null,		);		$queryRun = Librarylogin::where('libraryid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
