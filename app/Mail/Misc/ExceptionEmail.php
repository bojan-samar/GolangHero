<?php

namespace App\Mail\Misc;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ExceptionEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $css;
    public $content;
    public $fullUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($css, $content, $fullUrl)
    {
        $this->css = $css;
        $this->content = $content;
        $this->fullUrl = $fullUrl;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'New Exception Email',
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
            view: 'emails.misc.exception',
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
