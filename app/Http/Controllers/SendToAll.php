<?php

namespace App\Http\Controllers;

use App\Mail\ViaMail;
use App\Post;
use App\SendToAll\SendViaMail;
use App\SendToAll\ViaFBModel;
use App\SendToAll\ViaMailModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendToAll extends Controller
{
    public function send()
    {
        $post = new Post();
        $post = $post->getToBeSend();
        
        foreach ($post as $row) {

            $this->redirect($row);
        }
    }

    public function redirect($data)
    {
        switch ($data->recipient_type) {
            case 'mail':
                $this->ViaMail($data);
                break;
            case 'fb_post':   
                $this->ViaFB($data);
                break;
        }

    }

    public function ViaMail($data)
    {        
        $mail = new ViaMailModel($data);
        return $mail->send();
    }

    public function ViaFB($data)
    {        
        //echo "assasaas";
        $FB = new ViaFBModel($data);
        return $FB->getUser();
    }
}
