<?php

namespace App\Jobs;

use App\Mail\NotifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mailsForToday;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mailsForToday)
    {
       $this->$mailsForToday = $mailsForToday;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->mailsForToday as $mail){

            $receivers =  Notification::where('mail_content_id',$mail->id)->get();

            foreach ($receivers as $receiver){
                Mail::send(new NotifyEmail($mail,$receiver));
            }

        }
    }
}
