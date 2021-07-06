<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DeliveryNoteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $invoice_link = '';
    public function __construct($invoice_link)
    {
        $this->invoice_link = $invoice_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.delivery_noteEmail')
                    ->attach(public_path($this->invoice_link), [
                         'as' => 'delivery_note.pdf',
                         'mime' => 'application/pdf',
                    ]);
    }
}
