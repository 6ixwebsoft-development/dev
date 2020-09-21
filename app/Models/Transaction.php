<?php

namespace App\Models;

use App\Models\ModuleFieldValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
   protected $table = 'gg_transaction';

   static function all_count()
   {
   		//Transaction::groupBy('status')
   		$user_info = DB::table('gg_transaction')
                 ->select('status', DB::raw('count(*) as count,status'))
                 ->groupBy('status')
                 ->get();

        //dd($user_info);

        $newcount = [];
        foreach($user_info as $row){
			$newcount[] = ["status" => ModuleFieldValue::find($row->status)->value, "count" => $row->count];
	    }

	    //dd("asasa");
	    return $newcount;
	}
}
