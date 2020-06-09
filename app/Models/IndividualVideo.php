<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualVideo extends Model
{
   protected $table = 'individual_video';      static function delete_data($id)	{		$data = array(			'type'=>null,			'url'=>null,		);		$queryRun = IndividualVideo::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
