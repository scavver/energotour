<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCopy extends Mailable
{
    use Queueable, SerializesModels;

    protected $arrival;
    protected $departure;
    protected $hotel;
    protected $room;
    protected $payer;
    protected $order;
    protected $tourists;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($arrival, $departure, $hotel, $room, $payer, $order, $tourists)
    {
        $this->arrival      = $arrival;
        $this->departure    = $departure;
        $this->payer        = $payer;
        $this->order        = $order;
        $this->tourists     = $tourists;
        $this->hotel        = $hotel;
        $this->room         = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.copy')
            ->with([
                'arrival'   => $this->arrival,
                'departure' => $this->departure,
                'hotel'     => $this->hotel,
                'room'      => $this->room,
                'payer'     => $this->payer,
                'order'     => $this->order,
                'tourists'  => $this->tourists,
            ])
            ->subject('Копия заявки на бронирование');
    }
}
