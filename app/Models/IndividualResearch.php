<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualResearch extends Model
{
    protected $table = 'individual_research';		static function delete_data($id)	{		$data = array(			'researchsubject'=>null,			'researchobjective'=>null,			'researchlimitation'=>null,			'researchadditionalinfo'=>null,			'researchstartdate'=>null,			'researchenddate'=>null,			'researchgovtsupport'=>null,			'researchprevstudy'=>null,			'researchprevschool'=>null,			'researchhighschool'=>null,		);		$queryRun = IndividualResearch::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
