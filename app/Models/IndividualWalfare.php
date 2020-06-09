<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualWalfare extends Model
{
    protected $table = 'individual_welfare';			static function delete_data($id)	{		$data = array(			'welfareneeds'=>null,			'welfareadditionalinfo'=>null,		);		$queryRun = IndividualWalfare::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
