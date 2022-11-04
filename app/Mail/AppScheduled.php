<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppScheduled extends Mailable
{
    use Queueable, SerializesModels;

    public $date, $time, $doctor;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date,$time,$doctor)
    {
        $this->date = $date;
        $this->time = $time;
        $this->doctor = $doctor;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'App Scheduled',
            from: new Address('medique@admin.com', 'Admin')
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.app-scheduled',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
