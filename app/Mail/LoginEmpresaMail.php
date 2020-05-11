<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginEmpresaMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = 'teste@gmail.com';
        $subject = 'email teste';

        return $this->view('emails.login_empresa')
            ->from(config('mail.from.address'))
            ->to($email)
            ->subject($subject)
            ->with('url',$this->url);
    }
}
