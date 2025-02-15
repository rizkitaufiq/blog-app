<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerifyJWTEmailNotification extends Notification
{
    use Queueable;
    protected $token;
    /**
     * Create a new notification instance.
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $verificationUrl = url("email/verify/{$this->token}");

        return (new MailMessage)
            ->subject('Verifikasi Akun Anda')
            ->greeting('Halo, ' . $notifiable->username . '!')
            ->line('Silakan klik tombol di bawah untuk memverifikasi akun Anda.')
            ->action('Verifikasi Email', $verificationUrl)
            ->line("Atau gunakan token berikut: {$this->token}")
            ->line('Jika Anda tidak membuat akun ini, abaikan email ini.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
