<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class VerifyEmailNotification extends Notification
{
    use Queueable;

    protected $verificationUrl;
    protected $name;
    protected $profilePhotoUrl;
    /**
     * Create a new notification instance.
     */
    public function __construct($verificationUrl, $name, $profilePhotoUrl)
    {
        $this->verificationUrl = $verificationUrl;
        $this->profilePhotoUrl = $profilePhotoUrl;
        $this->name = $name;
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
        return (new MailMessage)
            ->view('emails.verify-email', [
                'verificationUrl' => $this->verificationUrl,
                'name' => $this->name,
                'profilePhotoUrl' => $this->profilePhotoUrl
            ])
            ->subject('Verify Your Email Address')
            ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
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
