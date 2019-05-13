<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Forms extends Mailable
{
  use Queueable, SerializesModels;
  protected $form;

  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct($form)
   {
     $this->form = $form;
   }

  /**
   * Build the message.
   *
   * @return $this
   */
   public function build()
   {
       return $this
         ->subject('お問い合わせありがとうございます。')
         ->view('mails.form')
         ->with(['form' => $this->form]);
   }
}
