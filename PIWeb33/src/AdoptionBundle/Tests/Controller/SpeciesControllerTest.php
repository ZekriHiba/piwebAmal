<?php

namespace AdoptionBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SpeciesControllerTest extends WebTestCase
{
    public function testRead()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Read');
    }

    public function testCreatespecies()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CreateSpecies');
    }

    public function testCreatesubspecies()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/CreateSubSpecies');
    }

    public function testUpdatespecies()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/UpdateSpecies');
    }

    public function testUpdatesubspecies()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'DeleteSpeciesAction');
    }

    public function testDeletesubspecies()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/DeleteSubSpecies');
    }

}
