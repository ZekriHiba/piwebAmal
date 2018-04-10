<?php

namespace AdoptionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WishlistAdoptionControllerTest extends WebTestCase
{
    public function testAddwishlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/AddWishlist');
    }

    public function testDeletewishlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/DeleteWishlist');
    }

    public function testShowwishlist()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ShowWishlist');
    }

}
