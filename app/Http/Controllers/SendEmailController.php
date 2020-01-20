<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Mail;
 
class SendEmailController extends Controller
{

    public function sendmail()
    {
        $data['title'] = "Laravel Send Email From Mail trap";
 
        Mail::send('mailview', $data, function($message) {
 
            $message->to('viktor@sixwebsoft.com', 'Receiver Name')
 
                    ->subject('Laravel Send Email');
        });
 
        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           return response()->json('Yes, You have sent email from LARAVEL !!');
         }
    }
}