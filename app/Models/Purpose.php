<?php

namespace App\models;
use App\Models\Hitlist;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $table = 'purpose';


	protected $appends  = [
        'formdata'
    ];
	
	public function getFormdataAttribute() {
		$dd = json_decode($this->hitlist,true);
        $datahit = array();
        if(!empty($dd)){
        foreach ($dd as $row) {
        $datahit[] =	Hitlist::find($row)->select('name', 'id')->first();;
        }

        }
        return $datahit;
	}



}


