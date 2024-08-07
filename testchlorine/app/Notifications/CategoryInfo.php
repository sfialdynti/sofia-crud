<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryInfo extends Notification
{
    use Queueable;

    protected $category;
    protected $action;

    /**
     * Create a new notification instance.
     */
    public function __construct($category, $action)
    {
        $this->category = $category;
        $this->action = $action;
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
                    ->subject('Category Info')
                    ->line("Category '{$this->category->name}' sudah berhasil {$this->action} ")
                    ->action('Lihat selengkapnya', url('/kategori'))
                    ->line('Terimakasih telah menggunakan aplikasi kami');
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
