<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.user_registered')
                    ->subject('Selamat Datang di Aplikasi Kami')
                    ->with([
                        'name' => $this->user->name,
                        'email' => $this->user->email,
                        'registered_at' => $this->user->created_at->format('d-m-Y H:i:s')
                    ]);
    }
}
