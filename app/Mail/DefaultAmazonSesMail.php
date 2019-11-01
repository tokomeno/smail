<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultAmazonSesMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $text;

    public function __construct(string $subject, string $text)
    {
        $this->text = $text;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config("services.ses.mail_from"))->markdown('emails.ses.index', ['content' => $this->text]);
    }
}