<?php

namespace FML\Notification\NotificationBundle\Message;

use FML\Notification\Message\Message;

class PlainMailMessage extends Message
{
    public function __construct()
    {
        $this->channel = 'mail';
    }

    /**
     * @return string
     */
    public function getContent()
    {
        $content =
            $this->getSubject()
            ."\r\n"
            ."Hello "
            .$this->getRecipient()->getName()
            ." "
            .$this->getRecipient()->getAddress()
            ."\r\n"
        ;
        foreach ($this->parameters as $key => $parameter) {
            $content .= $key.":".$parameter."\r\n";
        }

        return $content;
    }
}