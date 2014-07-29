<?php

namespace FML\Notification\NotificationBundle\EventListener;

use FML\Notification\Sender;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

/**
 * We are listening to terminate event and send notifications
 */
class NotificationSendListener {

    /**
     * @var Sender
     */
    private $sender;

    /**
     * @param Sender $sender
     */
    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @param PostResponseEvent $event
     */
    public function onTerminate(PostResponseEvent $event) {
        $this->sender->send();
    }
}
