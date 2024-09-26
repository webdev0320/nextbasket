<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Psr\Log\LoggerInterface;

class NotificationController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function receiveNotification($data)
    {
        // Log the received data
        $this->logger->info("Notification Received: " . json_encode($data));

        return new JsonResponse(['status' => 'Notification received'], 200);
    }
}