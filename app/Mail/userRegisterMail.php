<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class userRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Вы зарегистрировались на сайте '.config('app.name'))->view('mail.userRegister')->with([
            'login' => $this->user->name,
            'password' => $this->password,
            'company_name' => $this->user->company_name,
            'siteName' => config('app.name'),
            'siteUrl' => config('app.url'),

          ]);

       // return $this->view('user.register');
    }
}
