<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Client;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractRepository
{
    /** @var Client */
    protected $client;
    /** @var Serializer */
    protected $serializer;

    /**
     * AbstractRepository constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $normalizers = [
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, new ReflectionExtractor()),
            new ArrayDenormalizer(),
        ];
        $this->serializer = new Serializer($normalizers);
    }

    protected function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Return the api resource.
     */
    abstract protected function getResource();
}
