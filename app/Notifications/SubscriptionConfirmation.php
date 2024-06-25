<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Thank you for subscribing to the Yowza! newsletter')
            ->line('Hello ' . $notifiable->name . ',')
            ->line('Thank you for subscribing to our newsletter!')
            ->line('Yours sincerely,')
            ->line('The Yowza! Team');
    }

    public function toArray($notifiable)
    {
        return [
            // If you need to send data via other channels
        ];
    }
}
