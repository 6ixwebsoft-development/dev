<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functions extends Model
{
    public function stringEmailCheck($str,$delimiter)
    {
    	$all_emails = explode($delimiter,$str);
    	foreach ($all_emails as $row) {
    		if (!filter_var($row, FILTER_VALIDATE_EMAIL)) {
    			return false;
			  exit;
			}
    	}
    	return true;
    }
    
    public function CheckPhone($mob)
    {
    	if(strlen($mob) == 10 && is_numeric($mob)){
    		return true;
    	}
    	return false;
    }
    public function lang_slug($v)
    {
        $v = str_replace("!", "",$v);        
        $v = str_replace(".", "",$v);
        $v = trim($v);
        $v = strtolower(str_replace(" ", "_",$v));
        return $v;
    }
}
