<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
   protected $table = 'individual';
   
   
	public function care()
	{    	
		return $this->hasMany('App\Models\IndividualCare','individualid');
	}
	
	public function childern()
	{    	
		return $this->hasMany('App\Models\IndividualChildern','individualid');
	}
	
	public function contact()
	{    	
		return $this->hasMany('App\Models\IndividualContact','individualid');
	}
	
	public function purpose()
	{    	
		return $this->hasMany('App\Models\IndividualPerpose','individualid');
	}
	
	public function personal()
	{    	
		return $this->hasMany('App\Models\IndividualPersonal','individualid');
	}
	
	public function project()
	{    	
		return $this->hasMany('App\Models\IndividualProject','individualid');
	}
	
	public function research()
	{    	
		return $this->hasMany('App\Models\IndividualResearch','individualid');
	}
	
	public function study()
	{    	
		return $this->hasMany('App\Models\IndividualStudy','individualid');
	}
	
	public function video()
	{    	
		return $this->hasMany('App\Models\IndividualVideo','individualid');
	}
	
	public function walfare()
	{    	
		return $this->hasMany('App\Models\IndividualWalfare','individualid');
	}
	
	static function alldata($id)
	{
		$tablegetdata = ['care','childern','contact','purpose','personal','project','research','study','video','walfare'];
		return Individual::find($id)->with($tablegetdata)->get();
	}
	
	static function search($data)
	{
		$tablegetdata = ['care','childern','contact','purpose','personal','project','research','study','video','walfare'];
		return Individual::find($id)->with($tablegetdata)->get();
	}
	static function delete_data($id)	{		$data = array(			'firstname'=>'DELETE_'.$id.'@globalgarnt.com',			'lastname'=>'DELETE_'.$id.'@globalgarnt.com',			'middlename'=>null,			'age'=>null,			'dob'=>null,			'language'=>null,			'availability'=>0,		);		$queryRun = Individual::where('userid', $id)->update($data);		if($queryRun)		{			return true;		}else{			return false;		}	}
	
}
