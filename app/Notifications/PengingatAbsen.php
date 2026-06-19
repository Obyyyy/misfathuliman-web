<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class PengingatAbsen extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private string $jenis)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [WebPushChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Isi notifikasi push
     */
    public function toWebPush(object $notifiable, $notification): WebPushMessage
    {
        $masuk = $this->jenis === 'masuk';

        return (new WebPushMessage)
            ->title($masuk
                ? '🕐 Pengingat Absen Masuk'
                : '🕑 Pengingat Absen Pulang')
            ->body($masuk
                ? 'Jangan lupa absen masuk sebelum jam 07.00!'
                : 'Jangan lupa absen pulang sebelum meninggalkan madrasah.')
            ->icon('/images/icons/launchericon-192x192.png')
            ->badge('/images/icons/launchericon-96x96.png')
            ->vibrate([200, 100, 200])
            ->data(['url' => '/admin']);
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