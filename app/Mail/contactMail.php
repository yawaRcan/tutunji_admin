<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

//    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        //$this->details = $details;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('frontend.pages.email.contact-mail');
//        return $this->from('radha.tinnypixel@gmail.com')
//            ->subject('About New Contact inquiry Submitted')
//            ->view('frontend.pages.contactMail')
//            ->with('details',$this->details);
    }
}
