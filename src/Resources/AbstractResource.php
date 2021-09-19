<?php

namespace Chiiya\Tmdb\Resources;

use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Query\QueryParameterInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

abstract class AbstractResource
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all entities.
     *
     * @throws GuzzleException
     */
    protected function get(string $path, array $filters = []): array
    {
        return $this->execute('GET', $path, $filters);
    }

    /**
     * Execute a request on this resource.
     *
     * @throws GuzzleException
     */
    protected function execute(string $method, string $url, array $filters = [], ?JsonSerializable $class = null): array
    {
        $request = new Request($method, $url, $this->commonHeaders(), $class ? json_encode($class) : null);

        foreach ($filters as $key => $filter) {
            if ($filter instanceof QueryParameterInterface) {
                unset($filters[$key]);
                $filters[$filter->getKey()] = $filter->getValue();
            }
        }

        $response = $this->client->request($request, ['query' => $filters]);

        return json_decode($response->getBody(), true);
    }

    /**
     * Common HTTP headers for all requests.
     */
    #[ArrayShape(['Content-Type' => 'string', 'Accept' => 'string'])]
    protected function commonHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ];
    }
}
