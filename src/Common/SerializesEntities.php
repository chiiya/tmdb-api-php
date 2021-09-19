<?php

namespace Chiiya\Tmdb\Common;

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

trait SerializesEntities
{
    protected function createSerializer(): Serializer
    {
        $extractor = new ReflectionExtractor(inflector: new EnglishInflector());
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $discriminator = new ClassDiscriminatorFromClassMetadata($classMetadataFactory);
        $normalizers = [
            new DateTimeNormalizer(),
            new ObjectNormalizer(
                nameConverter: new CamelCaseToSnakeCaseNameConverter(),
                propertyTypeExtractor: $extractor,
                classDiscriminatorResolver: $discriminator
            ),
            new ArrayDenormalizer(),
        ];

        return new Serializer($normalizers);
    }
}
