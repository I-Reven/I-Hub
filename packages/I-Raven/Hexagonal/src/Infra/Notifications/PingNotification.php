<?php

namespace IRaven\Hexagonal\Infra\Notifications;

use Illuminate\Notifications\Messages\SlackMessage;

/**
 * Class PingNotification
 * @package IRaven\Hexagonal\Infra\Notifications
 */
class PingNotification extends BaseNotification
{
    /**
     * Get the notification channels.
     *
     * @param mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Determine which queues should be used for each notification channel.
     *
     * @return array
     */
    public function viaQueues(): array
    {
        return [
            'slack' => 'slack-queue',
        ];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param mixed $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->success()
            ->content('Ping Slack Notify!');
    }
}
