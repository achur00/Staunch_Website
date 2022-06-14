<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CareerSubmitted extends Notification
{
    use Queueable;

        protected $dev;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    
    public function __construct($dev)
    {
        $this->dev = $dev;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)        
                    ->from('info@staunchtechnologies.com', 'Staunch Technologies')
                    ->line('Hello dear '.$this->dev->name)
                    ->line('Your application have been received,')
                    ->line('we will get back to you as soon as possible.')
                    ->line('Thanks for your interest!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
