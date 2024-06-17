<?php

namespace App\Mail;

use App\Models\application;
use Faker\Provider\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationCreated extends Mailable
{
    use Queueable, SerializesModels;

    
    public function __construct(public application $application)
    {
       
    }

    
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'jamshid@gmail.com',
            subject: 'Application Created',
        );
    }

   
    public function content(): Content
    {
        return new Content(
            view: 'emails.applicationCreated',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromStorageDisk('public', (string)$this->application->file_url)
            //     ->as('name.jpg')
            //     ->withMime('application/jpg'),
        ];
    }
}
