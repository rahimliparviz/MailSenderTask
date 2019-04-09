<?php

namespace App\Http\Controllers;

use App\Receiver;
use App\MailContent;
use App\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\NotificationRequest;

class SendEmailController extends Controller
{
    public function index(){
        return view('sendEmail')
            ->with('receivers',Receiver::all());
    }


    public function createNotification(NotificationRequest $request){
     
        $request->validated();


        $mailContent = MailContent::create(
            [
               'weekDay'=>$request->date,
               'hour'=>$request->time,
               'mailSubject'=> $request->subject,
                'mailContent'=>$request->mail_content
            ]
        );


       foreach ($request->receivers as $receiver){
           Notification::create([
               'receiver_email'=>$receiver,
               'mail_content_id'=>$mailContent->id
           ]);
       }

       return back()->withSuccess('Notification added successfully.');


    }
}
