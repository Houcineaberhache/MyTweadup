<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class paiement extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $paiement_added;
    private $client_payed;
    public function __construct($paiement_added,$client_payed)
    {
        $this->paiement_added = $paiement_added;
        $this->client_payed = $client_payed;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

 

    public function toArray(object $notifiable): array
    {
        return [
           'paiement_added'=>$this->paiement_added,
           'client_payed'=>$this->client_payed
        ];
    }
}
