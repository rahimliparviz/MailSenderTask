<?php

namespace App\Console\Commands;

use App\Jobs\SendEmail;
use App\MailContent;
use App\Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $weekday = Carbon::now()->dayOfWeek;

        $MailsForToday = MailContent::where('weekDay',$weekday)->get();

        if(count($MailsForToday) > 0){
            foreach($MailsForToday as $mail){
                dispatch(new SendEmail($mail))->delay(now()->addHour($mail->hour));
            }
        }

    }
}
