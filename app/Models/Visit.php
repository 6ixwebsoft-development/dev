<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Visit extends Model
{
    protected $table = 'gg_visit_count';
	
	
	static function savevisit($id,$type,$val)
	{
		$today = Carbon::now();
		$month = $today->month;
		$year = $today->year; 
		$data = Visit::where('library_id',$id)->where('year',$year)->where('type',$type)->first();
		//print_r($data);exit;
		if(!empty($data))
		{
			if($month == 1){$count = $data->month_1+1;}
			if($month == 2){$count = $data->month_2+1;}
			if($month == 3){$count = $data->month_3+1;}
			if($month == 4){$count = $data->month_4+1;}
			if($month == 5){$count = $data->month_5+1;}
			if($month == 6){$count = $data->month_6+1;}
			if($month == 7){$count = $data->month_7+1;}
			if($month == 8){$count = $data->month_8+1;}
			if($month == 9){$count = $data->month_9+1;}
			if($month == 10){$count = $data->month_10+1;}
			if($month == 11){$count = $data->month_11+1;}
			if($month == 12){$count = $data->month_12+1;}

			$visit = array(
				'library_id'=>$id,
				'type'=>$type,
				'year'=>$year,
				'month_'.$month.''=>$count,
				'total'=>$data->total+1,
				'updated_at'=>now()
			);
			//DB::enableQueryLog();
			$update = DB::table('gg_visit_count')->where('library_id', $id)->where('year',$year)->where('type',$type)->update($visit);
			//dd(DB::getQueryLog());	
			return $update;
		}else{
			
			
			if(Visit::check_data($id,1,$year)){
				Visit::insert_data($id,1,$year,$val);
			}
			if(Visit::check_data($id,2,$year)){
				Visit::insert_data($id,2,$year,$val);
			}
			if(Visit::check_data($id,3,$year)){
				Visit::insert_data($id,3,$year,$val);
			}
			
		}
	}
	
	public static function check_data($id,$type,$year)
	{
		$data = Visit::where('library_id',$id)->where('year',$year)->where('type',$type)->first();
		if(!empty($data))
		{
			return false;
		}else{
			return true;
		}
	}
	
	public static function insert_data($id,$type,$year,$val)
	{
		$today = Carbon::now();
		$month = $today->month;
		$year = $today->year; 
		$visit = array(
				'library_id'=>$id,
				'type'=>$type,
				'year'=>$year,
				'month_'.$month.''=>$val,
				'total'=>$val,
				'updated_at'=>now()
			);
			$Visit_id = Visit::insertGetId($visit);
			return $Visit_id;
	}
	
	
}
