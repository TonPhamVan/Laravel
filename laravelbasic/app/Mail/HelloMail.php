<?php

namespace App\Mail;

use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use function GuzzleHttp\Promise\queue;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $user)
    {
        $this->user = $user;
        // $this->queue = 'email';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("hello test mail")
            ->view('mails.hellomail')->with([
            'user'=>$this->user
        ]);
    }
}
