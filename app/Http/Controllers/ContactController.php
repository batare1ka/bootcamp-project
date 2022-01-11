<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use Illuminate\Mail\Message;


class ContactController extends Controller
{
    public function index(){
        return view('contact.contact');
    }
    public function send(ContactUsRequest $request){
        $callback = function(string $test){
            return "{$test} input";
        };
        
        $data = $request->validated();
         \Log::debug($callback('test'), $data);

         \Mail::send(
             "emails.contactUs",
             [
                 'name' => $data['name'],
                 'email'=> $data['email'],
                 'phone' => $data['phone'],
                 'country' => $data['country'],
                 'region' => $data['region'],
                 'messageText'=> $data['message']

             ], 
             function (Message $message) use ($data){
                 $message->subject('Contact Us requested from' . $data['email']);
                 $message->to('tech@ballon.app');
                 $message->from('no-reply@ballon.app', 'ballon mailer');
         });
       return  redirect()->route('contact')->withInput($data);
    }
}
