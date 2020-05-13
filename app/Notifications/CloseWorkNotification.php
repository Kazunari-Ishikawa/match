<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CloseWorkNotification extends Notification
{
    use Queueable;
    public $work;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($work,$user)
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
            ->subject('案件の成約通知')
            ->greeting('案件が成約済みとなりました')
            ->line('あなたが応募していた下記の案件について、依頼者によって案件が成約済みとなったので連絡します。')
            ->line('この案件への応募は取り消されます。')
            ->line('また、これまでのメッセージのやりとりも削除されました。')
            ->line('案件名：'.$this->work->title)
            ->line('依頼者：'.$this->user->name);
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
