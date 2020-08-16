<?php

namespace Chiiya\Tmdb;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * API gateway for limiting outgoing API requests.
 */
class Gateway
{
    protected Client $client;
    protected string $host;
    protected string $token;

    /**
     * Gateway constructor.
     */
    public function __construct(Client $client, string $host, string $token)
    {
        $this->client = $client;
        $this->host = $host;
        $this->token = $token;
    }

    /**
     * Request an API resource.
     *
     * @throws GuzzleException
     */
    public function request(RequestInterface $request, array $filters = []): ResponseInterface
    {
        $request = $request->withUri(new Uri(rtrim($this->host, '/').'/'.$request->getUri()));
        $request = $request->withHeader('Authorization', 'Bearer '.$this->token);

        $this->registerRetryMiddleware();

        return $this->client->send($request, $filters);
    }

    /**
     * Copied from https://github.com/php-tmdb/api/blob/2.1/lib/Tmdb/HttpClient/Adapter/GuzzleAdapter.php.
     */
    public function registerRetryMiddleware(): void
    {
        /** @var HandlerStack $handler */
        $handler = $this->client->getConfig('handler');

        $handler->push(Middleware::retry(function (
            $retries,
            Request $request,
            Response $response = null,
            RequestException $exception = null
        ) {
            if ($retries >= 5) {
                return false;
            }

            // Retry connection exception
            if ($exception instanceof ConnectException) {
                return true;
            }

            if ($response) {
                if ($response->getStatusCode() >= 500) {
                    return true;
                }

                if ($response->getStatusCode() === 429) {
                    $sleep = (int) $response->getHeaderLine('retry-after');

                    if (0 === $sleep) {
                        $sleep = 1;
                    }

                    // TMDB allows 40 requests per 10 seconds, anything higher should be faulty.
                    if ($sleep > 10) {
                        return false;
                    }

                    sleep($sleep);

                    return true;
                }
            }

            return false;
        }));
    }
}
