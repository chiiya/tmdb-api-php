<?php

namespace Chiiya\Tmdb;

use Symfony\Component\OptionsResolver\OptionsResolver;

class Client
{
    use HasApiResources;

    public const TMDB_URI = 'https://api.themoviedb.org/3';

    /** @var array */
    protected $options = [];
    /** @var Gateway */
    protected $gateway;

    /**
     * Client constructor.
     * @param string $token
     * @param array $options
     */
    public function __construct(string $token, array $options = [])
    {
        $this->resolveOptions(array_replace(['token' => $token], (array) $options));
        $this->gateway = new Gateway($this->options['client'], $this->options['host'], $this->options['token']);
    }

    /**
     * Resolve user options.
     *
     * @param array $options
     */
    protected function resolveOptions(array $options): void
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined(['host', 'token', 'cache', 'client']);
        $resolver->setRequired(['host', 'token', 'cache']);
        $resolver->setDefaults([
            'host' => self::TMDB_URI,
            'token' => null,
            'cache' => [],
            'client' => new \GuzzleHttp\Client(),
        ]);

        $resolver->setAllowedTypes('host', ['string']);
        $resolver->setAllowedTypes('token', ['string']);
        $resolver->setAllowedTypes('client', ['object']);

        $this->options = $resolver->resolve($options);
    }

    /**
     * @return Gateway
     */
    public function getGateway(): Gateway
    {
        return $this->gateway;
    }
}
