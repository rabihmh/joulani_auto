<?php

namespace App\Notifications;

use App\Models\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailVehicleCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $vehicle;

    public function __construct($vehicle)
    {
        $this->vehicle = $vehicle;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $vehicle = $this->vehicle;
        return (new MailMessage)
            ->subject('New Vehicle Created')
            ->line('A new vehicle has been added to the inventory:')
            ->line('Make: ' . $vehicle->made->name)
            ->line('Model: ' . $vehicle->mould->name)
            ->line('Year: ' . $vehicle->year)
            ->action('View Vehicle', route('admin.vehicles.show', $vehicle->id))
            ->line('Thank you for using our application!');
    }

    public function toBroadcast(object $notifiable): BroadcastMessage
    {

        $vehicle = $this->vehicle;
        $data = [
            'body' => 'New Vehicle Created',
            'icon' => 'la la-file-alt text-white',
            'url' => "admin/dashboard/vehicles/{$vehicle->id}"
        ];
        $notification = $notifiable->notifications()->create([
            'id' => $this->id,
            'type' => get_class($this),
            'data' => $data,
            'read_at' => null,
            'notifiable_id' => $notifiable->id,
            'notifiable_type' => get_class($notifiable),
        ]);
        return new BroadcastMessage([
            'data' => $data,
            'read_at' => null,
            'notification_id' => $notification->id,
        ]);
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
