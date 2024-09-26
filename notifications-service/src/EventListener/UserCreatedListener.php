<?php
namespace App\EventListener;

use App\Event\UserCreatedEvent;
use Psr\Log\LoggerInterface;

class UserCreatedListener
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onUserCreated(UserCreatedEvent $event)
    {
        $user = $event->getUser();
        $this->logger->info("User created: " . $user->getEmail());
    }
}
