<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data = [];
    public function __construct($subject,$message,$invoice_link,$invoice_name)
    {
        $this->data['subject'] = $subject;
        $this->data['messgae'] = $message;
        $this->data['invoice_link'] = $invoice_link;
        $this->data['invoice_name'] = $invoice_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@akaunter.com',"Akaunter Mail")
                    ->view('emails.default_mail')
                    ->subject($this->data['subject'])
                    ->with(['data'=>$this->data]);
    }
}
