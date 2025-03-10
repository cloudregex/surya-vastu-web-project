<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    public $token;
    public $name;
    public $profilePhotoUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct($token, $name, $profilePhotoUrl)
    {
        $this->token = $token;
        $this->name = $name;
        $this->profilePhotoUrl = $profilePhotoUrl;
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
        $resetUrl = url(route('auth.password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->view('emails.forgot-password', [
                'resetUrl' => $resetUrl,
                'name' => $this->name,
                'profilePhotoUrl' => $this->profilePhotoUrl
            ])

            ->subject('Reset Your Password')
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
