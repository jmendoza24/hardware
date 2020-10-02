<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioFlux extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $attachment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $attachment)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $email = $this->markdown('cotizador.mailEnvio')
                ->from('ventas@cotiza.tech')
                ->subject($this->subject)
                ->with('content', $this->content);
         foreach ($this->attachment as $item) {
            $email->attach($item);
        }
        return $email;
    }
}

   