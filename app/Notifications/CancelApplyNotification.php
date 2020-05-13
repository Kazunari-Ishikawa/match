<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CancelApplyNotification extends Notification
{
    use Queueable;
    public $work;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($work, $user)
    {
        $this->work = $work;
        $this->user = $user;
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
                    ->subject('応募の取り消し通知')
                    ->greeting('応募が取り消されました')
                    ->line('あなたが登録した下記の案件について、応募が取り消されましたので連絡します。')
                    ->line('同時にメッセージのやりとりも削除されました。')
                    ->line('案件名：'.$this->work->title)
                    ->line('取り消した応募者：'.$this->user->name);
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
