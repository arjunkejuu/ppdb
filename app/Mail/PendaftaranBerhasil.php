<?php

namespace App\Mail;

use App\Models\Pdb;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendaftaranBerhasil extends Mailable
{
    use Queueable, SerializesModels;

    public $pdb;
    
    public function __construct(Pdb $pdb)
    {
        $this->pdb = $pdb;
    }

    public function build()
    {
        $url = url('https://paudbungapandan.sch.id/status-pendaftaran?query=' . urlencode($this->pdb->nama_pdb));

        return $this->subject('Pendaftaran Berhasil')
                    ->view('emails.pendaftaran-berhasil')
                    ->with([
                        'nama' => $this->pdb->nama_pdb,
                        'statusLink' => $url,
                    ]);
    }
}
