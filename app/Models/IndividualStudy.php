<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndividualStudy extends Model
{
    protected $table = 'individual_study';		static function delete_data($id)	{		$data = array(			'studyfield'=>null,			'studydegree'=>null,			'studyschool'=>null,			'studylocation'=>null,			'studystart'=>null,			'studyend'=>null,			'studygovtsupport'=>null,			'studypreviousdegree'=>null,			'studyprevioulength'=>null,			'studypreviousschool'=>null,			'studyprevioulocation'=>null,			'studyhighschool'=>null,			'studyhighlocation'=>null,			'studyhighotherlocation'=>null,			'studyhighotherinfo'=>null,			'studyadditionalinfo'=>null,		);		$queryRun = IndividualStudy::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
}
