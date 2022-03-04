<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Services\ContactUsMailer;


class ContactController extends Controller
{
    public function index(){
        return view('contact.contact');
    }
    public function send(ContactUsRequest $request , ContactUsMailer $mailer){

        $data = $request->validated();
        $mailer->send($data);

        
       return  redirect()->route('contact')->withInput($data);
    }
}
