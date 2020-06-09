<?php

namespace App\SendToAll;

use Illuminate\Database\Eloquent\Model;

class ViaMailModel extends Model
{
    function send($data)
    {
    	print_r($data);
    }
}
