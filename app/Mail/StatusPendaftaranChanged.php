<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StatusPendaftaranChanged extends Mailable
{
    use Queueable, SerializesModels;
    
    public $dataPdb;

    /**
     * Create a new message instance.
     */
    public function __construct($dataPdb)
    {
        //
        $this->dataPdb = $dataPdb;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Perubahan Status Pendaftaran')
                    ->view('emails.status');
    }
}
