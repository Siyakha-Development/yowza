<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Event;

class AdminRSVPCancellation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    public $event;
    public $rsvpCount;

    /**
     * Create a new message instance.
     */
    public function __construct(Event $event, $rsvpCount)
    {
        $this->event = $event;
        $this->rsvpCount = $rsvpCount;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'RSVP Cancellation Notification'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_rsvp_cancellation',
            with: [
                'event' => $this->event,
                'rsvpCount' => $this->rsvpCount,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
