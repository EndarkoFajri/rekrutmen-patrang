<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembaruan Status Lamaran - ' . ($this->application->job->title ?? 'Universitas Patrang'),
        );
    }
    public function build()
    {
        return $this->subject('Pembaruan Status Lamaran - Universitas Patrang')
                    ->view('emails.application_status_updated'); // sesuaikan nama view emailmu
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application_status_updated',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}