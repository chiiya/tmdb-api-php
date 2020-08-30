<?php

namespace Chiiya\Tmdb\Repositories;

use Chiiya\Tmdb\Client;
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
    protected Client $client;
    protected Serializer $serializer;

    /**
     * AbstractRepository constructor.
     *
     * @TODO: PHP8 named properties
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $extractor = new ReflectionExtractor(
            null,
            null,
            null,
            true,
            ReflectionExtractor::ALLOW_PUBLIC,
            new EnglishInflector()
        );

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $discriminator = new ClassDiscriminatorFromClassMetadata($classMetadataFactory);

        $normalizers = [
            new DateTimeNormalizer(),
            new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, $extractor, $discriminator),
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
