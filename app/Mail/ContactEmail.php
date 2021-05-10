<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Mailable class
 */
class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected Contact $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            // ->from('example@example.com')
            ->view('emails.contact')
            ->with(
                [
                    'contact_email' => $this->contact->email,
                    'subject' => $this->contact->subject,
                    'text' => $this->contact->description,
                ]
            );
    }
}
