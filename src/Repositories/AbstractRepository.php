<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Client;

abstract class AbstractRepository
{
    /** @var Client */
    private $client;

    /**
     * AbstractRepository constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Return the api resource.
     */
    abstract protected function getResource();
}
