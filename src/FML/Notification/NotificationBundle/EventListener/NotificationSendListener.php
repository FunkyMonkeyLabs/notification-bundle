<?php

namespace FML\Notification\NotificationBundle\EventListener;

use FML\Notification\BufferedMessageManager;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;

/**
 * We are listening to terminate event and flush notifications
 */
class NotificationSendListener {

    /**
     * @var BufferedMessageManager
     */
    private $manager;

    /**
     * @param Sender $sender
     */
    public function __construct(BufferedMessageManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param PostResponseEvent $event
     */
    public function onTerminate(PostResponseEvent $event) {
        $this->manager->flush();
    }
}
