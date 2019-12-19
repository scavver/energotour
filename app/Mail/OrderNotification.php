<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $payer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payer)
    {
        $this->payer = $payer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.notification')
            ->with(['payer' => $this->payer])
            ->subject('Новая заявка на сайте');
    }
}
