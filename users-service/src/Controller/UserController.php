<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

     /**
     * @Route("/users", methods={"POST"})
     */
    #[Route('/users', name: 'blog_list')]

    public function createUser(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        return $data;  
        $email = $data['email'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];

        // Log user data to a file
        $this->logger->info("User Created: Email: $email, First Name: $firstName, Last Name: $lastName");

        return new JsonResponse(['status' => 'User created'], 201);
    }
}

