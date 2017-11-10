<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $data;


    /**
     * SendPassword constructor.
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;

        return $this->from('info@prisma.care')
            ->subject('Uw nieuwe Prisma wachtwoord') // 'Your New Prisma Password'
            ->with($data)
            ->markdown('emails.your-new-password');
    }
}
