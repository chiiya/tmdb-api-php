<?php

namespace Chiiya\Tmdb\Resources;

use Chiiya\Tmdb\Client;
use GuzzleHttp\Psr7\Request;
use JsonSerializable;

abstract class AbstractResource
{
    /** @var Client */
    protected $client;

    /**
     * AbstractResource constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all entities.
     *
     * @return array
     */
    protected function get(string $path, array $filters = [])
    {
        return $this->execute('GET', $path, $filters);
    }

    /**
     * Execute a request on this resource.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     *
     * @return array
     */
    protected function execute(string $method, string $url, array $filters = [], ?JsonSerializable $class = null)
    {
        $request = new Request($method, $url, $this->commonHeaders(), $class ? json_encode($class) : null);
        $response = $this->client->getGateway()->request($request, $filters);

        return json_decode($response->getBody(), true);
    }

    /**
     * Common HTTP headers for all requests.
     */
    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
