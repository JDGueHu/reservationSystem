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

    public $sport;
    public $field_name;

    public function __construct($sport, $field_name)
    {
        $this->sport = $sport;
        $this->field_name = $field_name;
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
            ->view('email.email')
                ->with('sport',$this->sport)
                ->with('field_name',$this->field_name);
    }
}
