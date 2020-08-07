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
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all entities.
     *
     * @param string $path
     * @param array $filters
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
     * @param string $method
     * @param string $url
     * @param array $filters
     * @param JsonSerializable|null $class
     *
     * @return array
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function execute(string $method, string $url, array $filters = [], ?JsonSerializable $class = null)
    {
        $request = new Request($method, $url, $this->commonHeaders(), $class ? json_encode($class) : null);
        $response = $this->client->getGateway()->request($request, $filters);
        return json_decode($response->getBody(), true);
    }

    /**
     * Common HTTP headers for all requests.
     *
     * @return array
     */
    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
