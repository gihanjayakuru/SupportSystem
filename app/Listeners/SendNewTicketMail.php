<?php

namespace App\Listeners;

// use Mail;
use App\Events\TicketCreated;
use App\Mail\TicketCreated as NewTicketMail;
use Illuminate\Support\Facades\Mail;

class SendNewTicketMail
{

      /**
     * Handle the event.
     *
     * @param  \App\Events\TicketCreated  $event
     * @return void
     */
    public function handle(TicketCreated $event)
    {
      if (isset($event->ticket->email)) {
            // send the new ticket notification to user
            Mail::to($event->ticket->email)->send(new NewTicketMail($event->ticket));
          }
          
    }

  // /**
  //  * Handle the event.
  //  *
  //  * @param  TicketCreated  $event
  //  * @return void
  //  */
  // public function handle(TicketCreated $event)
  // {
  //   if (isset($event->ticket->email)) {
  //     // send the new ticket notification to user
  //     Mail::to($event->ticket->email)->send(new NewTicketMail($event->ticket));
  //   }
  // }
}