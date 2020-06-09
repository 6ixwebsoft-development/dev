<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiReturn extends Model
{
    // Protected $status = false;
    // Protected $msg = "";
    // Protected $error = "";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function return($status,$array)
    {
        if(is_array($array)){
            extract($array);    
        }    	
        //return json_encode();
        $return = ["status" => $status,"message" => $msg];
        if(!empty($array['error'])){
        	$return['error'] = $error;
        }
        if(!empty($array['data'])){
        	$return['data'] = $data;
        }
    }
}
