<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $replyMessage;

    public function __construct($name, $replyMessage)
    {
        $this->name = $name;
        $this->replyMessage = $replyMessage;
    }

    public function build()
    {
        return $this->subject('Réponse à votre message')
                    ->view('emails.message-reply');
    }
}
