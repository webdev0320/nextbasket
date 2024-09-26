<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testCreateUser()
    {
        $client = static::createClient();
        $client->request('POST', '/users', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'test@example.com',
            'firstName' => 'Test',
            'lastName' => 'User'
        ]));

        $this->assertResponseStatusCodeSame(201);
    }

    public function testCreateUserInvalidData()
    {
        $client = static::createClient();
        $client->request('POST', '/users', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode([
            'email' => 'invalid-email', // Invalid email
            'firstName' => '',           // Missing first name
            'lastName' => 'User'
        ]));

        $this->assertResponseStatusCodeSame(400); // Assuming validation fails and returns 400
    }
}
