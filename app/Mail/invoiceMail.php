<?php

namespace App\Mail;

use App\Models\sell_invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class invoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('pdf.sale_pdf')
        ->attach(public_path('pdf/'.$this->id .'.pdf'), ['as' => 'your-pdf-filename.pdf', 'mime' => 'application/pdf'])
        ->subject('Sample Subject');

    }
}
