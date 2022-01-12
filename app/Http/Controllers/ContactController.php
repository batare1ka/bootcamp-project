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

        $data = $request->validated();

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
                 $message->subject('Contact Us requested from ' . $data['email']);
                 $message->from($data['email'], $data['name']);
                 $message->to('e-commerce@clokids.app');
                 
         });
       return  redirect()->route('contact')->withInput($data);
    }
}
