<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $key;
    public $sum;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $key, $sum)
    {
        $this->email = $email;
        $this->key = $key;
        $this->sum = $sum;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail', [
            'email' => $this->email,
            'key' => $this->key,
        ]);
    }
}
