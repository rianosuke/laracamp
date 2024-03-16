<?php

namespace App\Mail\Checkout;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AfterCheckout extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'After Checkout',
        );
    }

    /**
     * Versi Tutorial BWA. Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->subject("Register Camp: {$this->checkout->Camp->title}")->markdown('emails.checkout.afterCheckout', [
    //         'checkout' => $this->checkout
    //     ]);
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    // public function content()
    // {
    //     return new Content(
    //         markdown: 'emails.checkout.afterCheckout',
    //         with: [

    //             'user' => $this->user,
    
    //           'url' => route('checkout')
    
    //            ]
    //     );
    // }

    /**
     * Tutorial versi BWA: Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Register Camp: {$this->checkout->Camp->title}")->markdown('emails.checkout.afterCheckout', [
            'checkout' => $this->checkout
        ]);
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
