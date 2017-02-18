<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $booking_id;
    public $sport;
    public $field_name;
    public $field_details;
    public $availability_date;
    public $availability_ini_hour;
    public $availability_fin_hour;
    public $rules;

    public function __construct($booking_id, $sport, $field_name, $field_details, $availability_date, $availability_ini_hour, $availability_fin_hour, $rules)
    {
        $this->booking_id = $booking_id;
        $this->sport = $sport;
        $this->field_name = $field_name;
        $this->field_details = $field_details;
        $this->availability_date = $availability_date;
        $this->availability_ini_hour = $availability_ini_hour;
        $this->availability_fin_hour = $availability_fin_hour;
        $this->rules = $rules;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('jdguehu@gmail.com')
            ->subject('Reserva Cancha sintética')
            ->view('email.email')
                ->with('booking_id',$this->booking_id)
                ->with('sport',$this->sport)
                ->with('field_name',$this->field_name)
                ->with('field_details',$this->field_details)
                ->with('availability_date',$this->availability_date)
                ->with('availability_ini_hour',$this->availability_ini_hour)
                ->with('availability_fin_hour',$this->availability_fin_hour)
                ->with('rules',$this->rules);
    }
}
