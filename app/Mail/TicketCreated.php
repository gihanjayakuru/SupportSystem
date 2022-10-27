<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Ticket;

class TicketCreated extends Mailable
{
    // use Queueable, SerializesModels;

    // public $ticket;

    // /**
    //  * Create a new message instance.
    //  *
    //  * @return void
    //  */
    // public function __construct(Ticket $ticket)
    // {
    //     $this->ticket = $ticket;
    // }
    // /**
    //  * Get the message envelope.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Envelope
    //  */
    // public function envelope()
    // {
    //     // return new Envelope(subject: 'Ticket Created');
    // }

    // /**
    //  * Get the message content definition.
    //  *
    //  * @return \Illuminate\Mail\Mailables\Content
    //  */
    // public function content()
    // {
    //     // return new Content(view: 'view.name');
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array
    //  */
    // public function attachments()
    // {
    //     // return [];
    // }

    // /**
    //  * Build the message.
    //  *
    //  * @return $this
    //  */
    // public function build()
    // {
    //     return $this->subject('New support ticket opened: ' . $this->ticket->ref)->view('mails.ticket-created', [
    //         'ticket' => $this->ticket,
    //     ]);
    // }
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('New support ticket opened: ' . $this->ticket->ref)
        ->view('mails.ticket-created', [
            'ticket' => $this->ticket
        ]);
    }

    
}