<?php

namespace Chiiya\Tmdb;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use JetBrains\PhpStorm\ArrayShape;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Client
{
    use HasApiResources;

    public const TMDB_URI = 'https://api.themoviedb.org/3';

    protected array $options = [];
    protected GuzzleClient $guzzle;

    public function __construct(string $token, array $options = [])
    {
        $this->resolveOptions(array_replace(['token' => $token], $options));
        $this->guzzle = $this->options['client'];
    }

    /**
     * Resolve user options.
     */
    protected function resolveOptions(array $options): void
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined(['host', 'token', 'cache', 'client', 'guzzle_config']);
        $resolver->setRequired(['host', 'token', 'cache']);
        $resolver->setDefaults([
            'host' => self::TMDB_URI,
            'token' => null,
            'cache' => [],
            'client' => new GuzzleClient(array_merge($this->getGuzzleConfig(), $options['guzzle_config'] ?? [])),
        ]);

        $resolver->setAllowedTypes('host', ['string']);
        $resolver->setAllowedTypes('token', ['string']);
        $resolver->setAllowedTypes('client', ['object']);

        $this->options = $resolver->resolve($options);
    }

    /**
     * Request an API resource.
     *
     * @throws GuzzleException
     */
    public function request(RequestInterface $request, array $filters = []): ResponseInterface
    {
        $request = $request->withUri(new Uri(rtrim($this->options['host'], '/').'/'.$request->getUri()));
        $request = $request->withHeader('Authorization', 'Bearer '.$this->getToken());

        return $this->guzzle->send($request, $filters);
    }

    /**
     * Get API token.
     */
    public function getToken(): ?string
    {
        return $this->options['token'];
    }

    /**
     * Set API token.
     */
    public function setToken(string $token): void
    {
        $this->options['token'] = $token;
    }

    /**
     * Get default guzzle config.
     */
    #[ArrayShape(['handler' => HandlerStack::class])]
    protected function getGuzzleConfig(): array
    {
        $stack = HandlerStack::create();

        // Handle rate-limiting
        $stack->push(Middleware::retry(function ($retries, RequestInterface $request, ?ResponseInterface $response = null) {
            if ($retries >= 5) {
                return false;
            }

            if ($response) {
                if ($response->getStatusCode() >= 500) {
                    return true;
                }

                if ($response->getStatusCode() === 429) {
                    sleep(((int) $response->getHeaderLine('retry-after')) ?: 1);

                    return true;
                }
            }

            return false;
        }));

        return ['handler' => $stack];
    }
}
