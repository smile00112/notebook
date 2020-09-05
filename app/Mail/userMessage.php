<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class userMessage extends Mailable
{
    use Queueable, SerializesModels;

    private $message;
    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $message)
    {
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Сообщение от пользователя - сайт '.config('app.name'))
        ->view('mail.userEmailMessage')
        ->with([
            'theme' => $this->message->theme,
            'user_name' => $this->user->company_name,
            'user_code' => $this->user->id,
            'user_email' => $this->user->email,
            'message_text' => $this->message->message,
            'created_at' => $this->message->created_at,
            'siteName' => config('app.name'),
            'siteUrl' => config('app.url'),

          ]);

       // return $this->view('user.register');
    }
}
