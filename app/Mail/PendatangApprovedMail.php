<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PendatangApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pendatang;
    public $catatan;

    /**
     * Create a new message instance.
     */
    public function __construct(User $pendatang, $catatan = null)
    {
        $this->pendatang = $pendatang;
        $this->catatan = $catatan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '✅ Akun Anda Telah Disetujui - Sistem Informasi Desa Bangah',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pendatang-approved',
            with: [
                'pendatang' => $this->pendatang,
                'catatan' => $this->catatan,
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

