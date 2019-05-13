<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Thank extends Mailable
{
  use Queueable, SerializesModels;
  protected $sales;


  /**
   * Create a new message instance.
   *
   * @return void
   */
   public function __construct($sales)
   {
     $this->sales = $sales;
   }

  /**
   * Build the message.
   *
   * @return $this
   */
   public function build()
   {
     return $this
       ->subject('ご注文ありがとうございます。')
       ->view('mails.thanks')
       ->with(['sales' => $this->sales]);
   }
}
