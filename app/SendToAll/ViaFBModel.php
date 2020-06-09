<?php

namespace App\SendToAll;

use App\User;
use Facebook\Facebook;
use Illuminate\Database\Eloquent\Model;

class ViaFBModel extends Model
{
    public $data;
    private $fb,$token;

	function __construct($data='')
	{
		$this->data = $data;	
		$this->fb = new Facebook([
		  'app_id' => '216803043051418',
		  'app_secret' => '5e2d45417054a4a86de0e33076419fa7',
		  'default_graph_version' => 'v2.10',
		  //'default_access_token' => '{access-token}', // optional
		]);
		$user = User::find($this->data->user_id);
		$this->token = $user->fb_token;

	}
	function getUser()
	{
		$user = User::find($this->data->user_id);
		//dd($user);
		$linkData = [
		  'link' => 'http://www.example.com',
		  'message' => 'auto test',
		  ];		  
		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $this->fb->post('/me/feed', $linkData, $this->token);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
	}
    function send()
    {	
    	$recipients = explode(",",$this->data->recipients); 
    	//echo "<pre>";
        $user = User::find($this->data->user_id);
    	$this->data->userData = $user;
        return true;
    }
}
