<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Client;

class KamouloxControllerTest extends WebTestCase
{
    public function testKamoulox()
    {
        $client = static::createClient();

        $client->request('GET', '/kamoulox');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        return $client;
    }

    /**
     * Test some corrects and incorrects route to see HTTP status codes.
     * @depends testKamoulox
     * @param  Client $client
     * @return Client
     */
    public function testRoutes(Client $client)
    {
        $crawler = $client->request('GET', '/kamoulox/fr');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/kamoulox/not_a_locale');

        $this->assertEquals(404, $client->getResponse()->getStatusCode(), '$_locale parameter check problem');

        $crawler = $client->request('GET', '/kamoulox/fr/nawak');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/kamoulox/fr/nawak_de_nawak');

        $this->assertEquals(404, $client->getResponse()->getStatusCode(), '$_type parameter check problem');

        $crawler = $client->request('GET', '/kamoulox/fr/nawak.html');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $crawler = $client->request('GET', '/kamoulox/fr/nawak.html');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
