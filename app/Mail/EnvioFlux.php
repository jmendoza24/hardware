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
    public function __construct($subject, $content, $attachment, $var, $var2, $vista)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->attachment = $attachment;
        $this->var = $var;
        $this->var2 = $var2;
        $this->vista = $vista;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $email = $this->markdown($this->vista)
                ->from('ventas@hardwarecollection.mx')
                ->subject($this->subject)
                ->with('content', $this->content)
                ->with('var',$this->var)
                ->with('var2',$this->var2);
         foreach ($this->attachment as $item) {
            $email->attach($item);
        }
        return $email;
    }
}

   