<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentVerification extends Mailable
{
    use Queueable, SerializesModels;
	public $request;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request= $request;
		$this->from('mnsec@mncert.org','MNSEC 2018');
		$this->subject('MNSEC 2018 Төлбөр төлөх заавар');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {	
        return $this->view('email.SentVerification');
    }
}
