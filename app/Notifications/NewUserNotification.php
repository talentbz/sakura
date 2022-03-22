<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserNotification extends Notification
{
    use Queueable;
    private $comments;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'comment_id' => $this->comments->id,
            'user_id' => $this->comments->user_id,
            'vehicle_id' => $this->comments->vehicle_id,
            'comments' => $this->comments->comments,
        ];
    }
}
