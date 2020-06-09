<?php

namespace App\Http\Controllers\SendToAll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendViaMail extends Controller
{
    public function send()
    {
        $post = new Post();
        $post = $post->getToBeSend();
        foreach ($post as $row) {
            
        }
    }
}
