<?php

namespace App\SendToAll;

use App\Mail\ViaMailMail;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ViaMailModel extends Model
{
	public $data;

	function __construct($data='')
	{
		$this->data = $data;		

	}
    function send()
    {	
    	$recipients = explode(",",$this->data->recipients); 
    	//echo "<pre>";
        $user = User::find($this->data->user_id);
    	$this->data->userData = $user;   	
    	//print_r($this->data);
    	Mail::to($recipients)->send(new ViaMailMail($this->data));        
        $post = Post::find($this->data->id);
        $post->sent = 1;
        $post->save();
        return true;
    }
}
