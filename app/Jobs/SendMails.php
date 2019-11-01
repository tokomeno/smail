<?php

namespace App\Jobs;

use App\MailList;
use Illuminate\Bus\Queueable;
use App\Mail\DefaultAmazonSesMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $subject;
    protected $text;

    public function __construct($subject, $text)
    {
        $this->subject = $subject;
        $this->text = $text;
    }

    public function handle(MailList $mailList)
    {

        $subject = $this->subject;
        $text = $this->text;
        $mailList->chunk(500, function ($mailLists) use ($subject, $text) {
            foreach ($mailLists as $mail) {
                Mail::to($mail->email)->send(new DefaultAmazonSesMail($subject, $text));
            }
        });
    }
}