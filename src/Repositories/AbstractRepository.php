<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Client;
use Chiiya\Tmdb\Common\SerializesEntities;
use Chiiya\Tmdb\Normalizers\EnglishInflector;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractRepository
{
    use SerializesEntities;

    protected Client $client;
    protected Serializer $serializer;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->serializer = $this->createSerializer();
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
