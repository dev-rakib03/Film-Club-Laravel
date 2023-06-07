<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\social;
                        

class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     
     
    public function __construct($data)
    {
        $this->subject = $data['subject'];
        $this->body = $data['body'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $socials_footer=social::all();
        $email_body = $this->body;
        return $this->subject($this->subject)
                    ->view('emails.apply',compact('email_body','socials_footer'));
    }
}
