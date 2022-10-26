<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivateUser extends Mailable
{
    use Queueable, SerializesModels;
    public $id = 0;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bekwebdeveloper@gmail.com', 'Авторизация!')
        ->view('mail.sendMail', compact($this->id));    
    }
}
